<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Lessons;

class CourseDetail extends Component
{
    public $course;
    public $lessons;
    public function mount($id)
    {
        $this->course = Courses::with('category')->findOrFail($id);
        $this->lessons = Lessons::where('course_id', $id)->orderBy('order')->get();
    }

    public function updateLessonOrder($items)
    {
        foreach ($items as $item) {
            Lessons::where('id', $item['value'])->update(['order' => $item['order']]);
        }

        $this->lessons = Lessons::where('course_id', $this->course->id)->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.course-detail', [
            'lessonsCount' => count($this->lessons),
        ])->layout('layouts.app');
    }
}
