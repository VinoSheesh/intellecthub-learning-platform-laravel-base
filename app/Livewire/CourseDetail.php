<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Lessons;

use function Livewire\Volt\title;

class CourseDetail extends Component
{
    public $course;
    public $lessons;
    public $openAddModal = false;
    public $title;
    public $content;


    public function mount($id)
    {
        $this->course = Courses::with('category')->findOrFail($id);
        $this->lessons = Lessons::where('course_id', $id)->orderBy('order')->get();
    }

    public function saveLesson()
    {
        $this->validate([
            'title' => 'required|min:3',
            'content' => 'required|',
        ]);

        $currentCourseId = $this->course->id;

        $lastOrder = Lessons::where('course_id', $currentCourseId)->max('order');

        Lessons::create([
            'course_id' => $currentCourseId,
            'title' => $this->title,
            'content' => $this->content,
            'order' => ($lastOrder ?? 0) + 1,
        ]);

        $this->openAddModal = false;

        $this->reset(['title', 'content']);
        $this->lessons = Lessons::where('course_id', $this->course->id)
            ->orderBy('order')
            ->get();

        $this->dispatch('lesson-added', message: 'Materi berhasil ditambahkan!');
    }

    public function updateLessonOrder($items)
    {
        foreach ($items as $item) {
            Lessons::where('id', $item['value'])->update(['order' => $item['order']]);
        }

        $this->lessons = Lessons::where('course_id', $this->course->id)->orderBy('order')->get();
    }

    public function deleteLesson($id)
    {
        $lesson = Lessons::findOrFail($id);

        $lesson->delete();

        $remainingLessons = Lessons::where('course_id', $this->course->id)->orderBy('order')->get();

        foreach ($remainingLessons as $index => $item) {
            $item->update(['order' => $index + 1]);
        }

        $this->lessons = Lessons::where('course_id', $this->course->id)->orderBy('order')->get();

        $this->dispatch('swal', [
            'title' => 'Dihapus!',
            'text' => 'Materi Berhasil Dihapus!',
            'icon' => 'success',
        ]);
    }

    public function openAddLessonModal()
    {
        $this->openAddModal = true;
    }

    public function closeAddLessonModal()
    {
        $this->openAddModal = false;
    }

    public function render()
    {
        return view('livewire.course-detail', [
            'lessonsCount' => count($this->lessons),
        ])->layout('layouts.app');
    }
}
