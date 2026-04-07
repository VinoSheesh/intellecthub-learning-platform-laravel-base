<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Enrollments;

class CourseCard extends Component
{
    public $course;
    public $isFavorite = false;
    public $enrollment = null;

    public function mount(Courses $course)
    {
        $this->course = $course;
        if (auth()->check()) {
            $this->enrollment = Enrollments::where('user_id', auth()->id())
                ->where('course_id', $this->course->id)
                ->first();
            
            if ($this->enrollment) {
                $this->isFavorite = $this->enrollment->is_favorite;
            }
        }
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->isFavorite = !$this->isFavorite;
        
        Enrollments::updateOrCreate(
            ['user_id' => auth()->id(), 'course_id' => $this->course->id],
            ['is_favorite' => $this->isFavorite]
        );

        $this->dispatch('refresh-favorites');
    }

    public function render()
    {
        return view('livewire.course-card');
    }
}
