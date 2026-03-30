<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Lessons;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;

class CoursePlayer extends Component
{
    public $course;
    public $lesson;
    public $lessons;
    public $enrollment;
    public $completedLessonIds = [];
    public $progress = 0;
    public $isSubscribed = false;
    public $courseId;
    public $lessonId;

    public function mount($courseId, $lessonId = null)
    {
        $this->courseId = $courseId;
        $this->course = Courses::with('lessons', 'category')->findOrFail($courseId);
        $this->lessons = $this->course->lessons;
        $user = Auth::user();

        // Check subscription
        $this->isSubscribed = $user->hasActiveSubscription();

        // Load or create enrollment
        $this->enrollment = Enrollments::firstOrCreate(
            ['user_id' => $user->id, 'course_id' => $courseId],
            ['status' => 'active']
        );

        // Load completed lesson IDs
        $this->completedLessonIds = $user->lessonProgress()
            ->where('lesson_user.is_completed', true)
            ->where('lessons.course_id', $courseId)
            ->pluck('lessons.id')
            ->toArray();

        // Determine lesson to show
        if ($lessonId) {
            $this->lesson = Lessons::where('course_id', $courseId)->findOrFail($lessonId);
        } elseif ($this->lessons->isNotEmpty()) {
            $this->lesson = $this->lessons->first();
        }

        $this->lessonId = $this->lesson?->id;
        $this->calculateProgress();
    }

    public function selectLesson($lessonId)
    {
        if (!$this->isSubscribed) {
            return redirect()->route('subscriptionplan');
        }

        $this->lesson = Lessons::where('course_id', $this->courseId)->findOrFail($lessonId);
        $this->lessonId = $lessonId;
    }

    public function markComplete()
    {
        if (!$this->lesson) return;

        $user = Auth::user();

        $user->lessonProgress()->syncWithoutDetaching([
            $this->lesson->id => ['is_completed' => true]
        ]);

        if (!in_array($this->lesson->id, $this->completedLessonIds)) {
            $this->completedLessonIds[] = $this->lesson->id;
        }

        $this->calculateProgress();

        // Auto-complete enrollment if all lessons done
        if ($this->progress >= 100) {
            $this->enrollment->update([
                'status' => 'completed',
            ]);
        }
    }

    private function calculateProgress()
    {
        $total = $this->lessons->count();
        if ($total === 0) {
            $this->progress = 0;
            return;
        }
        $completed = count($this->completedLessonIds);
        $this->progress = (int) round(($completed / $total) * 100);
    }

    public function render()
    {
        return view('livewire.course-player')->layout('layouts.app');
    }
}
