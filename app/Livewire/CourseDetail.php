<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Lessons;
use Livewire\Attributes\Validate;

class CourseDetail extends Component
{
    public $course;
    public $lessons;

    // Modal & Form State
    public $showModal = false;
    public $isEditing = false;
    public $editingLessonId = null;

    // Form Fields
    #[Validate('required|string|max:150')]
    public $title = '';

    #[Validate('required|string')]
    public $content = '';

    #[Validate]
    public function mount($id)
    {
        $this->course = Courses::with('category')->findOrFail($id);
        $this->lessons = Lessons::orderBy('order')->get();
        $this->loadLessons();
    }

    public function loadLessons()
    {
        $this->lessons = Lessons::where('course_id', $this->course->id)
            ->orderBy('order')
            ->get()
            ->map(fn($lesson) => [
                'id' => $lesson->id,
                'title' => $lesson->title,
                'content' => $lesson->content,
                'order' => $lesson->order,
            ])
            ->toArray();
    }

    public function openAddLessonModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->isEditing = false;
        $this->dispatchBrowserEvent('tinymce:init', ['content' => $this->content]);
    }

    public function openEditLessonModal($lessonId)
    {
        $lesson = Lessons::find($lessonId);

        if ($lesson) {
            $this->editingLessonId = $lessonId;
            $this->title = $lesson->title;
            $this->content = $lesson->content;

            $this->isEditing = true;
            $this->showModal = true;
            $this->dispatchBrowserEvent('tinymce:init', ['content' => $this->content]);
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->editingLessonId = null;
        $this->isEditing = false;
    }

    public function saveLessonLesson()
    {
        $this->validate();

        try {
            if ($this->isEditing && $this->editingLessonId) {
                $lesson = Lessons::find($this->editingLessonId);
                if ($lesson) {
                    $lesson->update([
                        'title' => $this->title,
                        'content' => $this->content,
                    ]);
                    $this->dispatch('lesson-updated', [
                        'title' => $this->title,
                        'icon' => 'success',
                        'message' => 'Materi berhasil diperbarui!'
                    ]);
                }
            } else {
                $maxOrder = Lessons::where('course_id', $this->course->id)
                    ->max('order') ?? 0;

                Lessons::create([
                    'course_id' => $this->course->id,
                    'title' => $this->title,
                    'content' => $this->content,
                    'order' => $maxOrder + 1,
                ]);
                $this->dispatch('lesson-created', [
                    'title' => $this->title,
                    'icon' => 'success',
                    'message' => 'Materi berhasil ditambahkan!'
                ]);
            }

            $this->loadLessons();
            $this->closeModal();
        } catch (\Exception $e) {
            $this->dispatch('lesson-error', [
                'icon' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteLesson($lessonId)
    {
        try {
            $lesson = Lessons::find($lessonId);
            if ($lesson) {
                $lessonTitle = $lesson->title;
                $lesson->delete();
                $this->dispatch('lesson-deleted', [
                    'title' => $lessonTitle,
                    'icon' => 'success',
                    'message' => 'Materi berhasil dihapus!'
                ]);
                $this->loadLessons();
            }
        } catch (\Exception $e) {
            $this->dispatch('lesson-error', [
                'icon' => 'error',
                'message' => 'Gagal menghapus materi: ' . $e->getMessage()
            ]);
        }
    }

    public function order()
    {
        foreach ($this->orders as $order) {
            Lessons::where('id', $order['value'])->update(['order' => $order['order']]);
        }
    }

    public function reorderLessons($ids)
    {
        try {
            foreach ($ids as $index => $id) {
                Lessons::where('id', $id)->update(['order' => $index + 1]);
            }
            $this->loadLessons();
            $this->dispatch('lesson-reordered', [
                'title' => 'Berhasil',
                'message' => 'Urutan materi berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('lesson-error', [
                'message' => 'Gagal mengurutkan: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.course-detail', [
            'lessonsCount' => count($this->lessons),
        ])->layout('layouts.app');
    }
}
