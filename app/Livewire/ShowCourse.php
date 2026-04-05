<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;

class ShowCourse extends Component
{
    public $course;
    public $lessons;
    public $enrollment;
    public $completedLessonIds = [];
    public $progress = 0;
    public $isSubscribed = false;
    public $isFavorite = false;

    public function mount($id)
    {
        $this->course = Courses::with(['category', 'lessons'])->findOrFail($id);
        $this->lessons = $this->course->lessons;

        $user = Auth::user();
        $this->isSubscribed = $user->hasActiveSubscription();

        $this->enrollment = Enrollments::where('user_id', $user->id)
            ->where('course_id', $id)
            ->first();

        if ($this->enrollment) {
            $this->isFavorite = $this->enrollment->is_favorite;
            $this->completedLessonIds = $user->lessonProgress()
                ->where('lesson_user.is_completed', true)
                ->where('lessons.course_id', $id)
                ->pluck('lessons.id')
                ->toArray();

            $total = $this->lessons->count();
            $completed = count($this->completedLessonIds);
            $this->progress = $total > 0 ? (int) round(($completed / $total) * 100) : 0;
        }
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->isFavorite = !$this->isFavorite;
        
        Enrollments::updateOrCreate(
            ['user_id' => Auth::id(), 'course_id' => $this->course->id],
            ['is_favorite' => $this->isFavorite]
        );
    }

    public function startCourse()
    {
        $user = Auth::user();
        Enrollments::firstOrCreate(
            ['user_id' => $user->id, 'course_id' => $this->course->id],
            ['status' => 'active']
        );
        return redirect()->route('courseplayer', ['courseId' => $this->course->id]);
    }

    public function render()
    {
        return view('livewire.show-course')->layout('layouts.app');
    }
}

