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
    public $showCompletionPage = false;
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
            ->map(fn($id) => (int) $id)
            ->toArray();

        $this->calculateProgress();

        // Determine lesson to show
        if ($lessonId === 'completed' && $this->progress >= 100) {
            $this->showCompletionPage = true;
            $this->lesson = null;
            $this->lessonId = null;
        } elseif ($lessonId) {
            $this->lesson = Lessons::where('course_id', $courseId)->findOrFail($lessonId);
            $this->lessonId = $lessonId;
        } elseif ($this->lessons->isNotEmpty()) {
            $this->lesson = $this->lessons->first();
            $this->lessonId = $this->lesson?->id;
        }

        if ($this->lessonId && $this->enrollment) {
            $this->enrollment->update(['last_lesson_id' => $this->lessonId]);
        }

        // Format konten agar URL gambar yang relatif menjadi absolut pada tag img
        if ($this->lesson && $this->lesson->content) {
            $this->lesson->content = preg_replace('/src="(?:..\/)*storage\//i', 'src="/storage/', $this->lesson->content);
        }
    }

    public function selectLesson($lessonId)
    {
        if (!$this->isSubscribed) {
            return redirect()->route('subscriptionplan');
        }

        // Use redirect for clean full-page navigation (avoids DOM diffing issues with rich HTML content)
        return $this->redirect(
            route('courseplayer', ['courseId' => $this->courseId, 'lessonId' => $lessonId]),
            navigate: false
        );
    }

    public function markComplete()
    {
        if (!$this->lesson) return;

        $user = Auth::user();

        // Save completion to DB
        $user->lessonProgress()->syncWithoutDetaching([
            $this->lesson->id => ['is_completed' => true]
        ]);

        // Update local state
        $lessonIdInt = (int) $this->lesson->id;
        if (!in_array($lessonIdInt, $this->completedLessonIds)) {
            $this->completedLessonIds[] = $lessonIdInt;
        }

        $this->calculateProgress();

        // If all lessons completed → redirect to completion page
        if ($this->progress >= 100) {
            $this->enrollment->update([
                'status' => 'completed',
            ]);
            return $this->redirect(
                route('courseplayer', ['courseId' => $this->courseId, 'lessonId' => 'completed']),
                navigate: false
            );
        }

        // Stay on current page — just re-render with updated state (button changes to "Lesson Selesai")
        // No redirect needed; Livewire will re-render the component.
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
        return view('livewire.course-player')->layout('layouts.course-player');
    }
}
