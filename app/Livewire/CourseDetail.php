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
    public $contentType = 'video';
    
    #[Validate('required|string')]
    public $content = '';
    
    #[Validate('nullable|string|max:255')]
    public $description = '';
    
    #[Validate('required|integer|min:1')]
    public $duration = 5;
    
    #[Validate('nullable|string|max:100')]
    public $sectionName = '';

    #[Validate]
    public function mount($id)
    {
        $this->course = Courses::with('category')->findOrFail($id);
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
                'content_type' => $lesson->content_type ?? 'video',
                'description' => $lesson->description ?? '',
                'duration' => $lesson->duration ?? 5,
                'section_name' => $lesson->section_name ?? '',
                'order' => $lesson->order,
            ])
            ->toArray();
    }

    public function getLessonsBySection()
    {
        $grouped = [];
        foreach ($this->lessons as $lesson) {
            $section = $lesson['section_name'] ?: 'Tanpa Bagian';
            if (!isset($grouped[$section])) {
                $grouped[$section] = [];
            }
            $grouped[$section][] = $lesson;
        }
        return $grouped;
    }

    public function openAddLessonModal($section = null)
    {
        $this->resetForm();
        if ($section) {
            $this->sectionName = $section;
        }
        $this->showModal = true;
        $this->isEditing = false;
    }

    public function openEditLessonModal($lessonId)
    {
        $lesson = Lessons::find($lessonId);
        
        if ($lesson) {
            $this->editingLessonId = $lessonId;
            $this->title = $lesson->title;
            $this->contentType = $lesson->content_type ?? 'video';
            $this->content = $lesson->content;
            $this->description = $lesson->description ?? '';
            $this->duration = $lesson->duration ?? 5;
            $this->sectionName = $lesson->section_name ?? '';
            
            $this->isEditing = true;
            $this->showModal = true;
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
        $this->contentType = 'video';
        $this->content = '';
        $this->description = '';
        $this->duration = 5;
        $this->sectionName = '';
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
                        'description' => $this->description,
                        'duration' => $this->duration,
                        'content_type' => $this->contentType,
                        'section_name' => $this->sectionName,
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
                    'description' => $this->description,
                    'duration' => $this->duration,
                    'content_type' => $this->contentType,
                    'section_name' => $this->sectionName,
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

    public function reorderLessons($lessonsOrder)
    {
        try {
            \Log::debug('Reorder lessons called with:', ['lessonsOrder' => $lessonsOrder]);
            
            // Ensure $lessonsOrder is an array
            if (!is_array($lessonsOrder)) {
                $lessonsOrder = json_decode($lessonsOrder, true) ?? [];
            }

            foreach ($lessonsOrder as $index => $lessonId) {
                Lessons::where('id', $lessonId)->update(['order' => $index + 1]);
            }
            $this->loadLessons();
            $this->dispatch('lesson-reordered', [
                'icon' => 'success',
                'message' => 'Urutan materi berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            \Log::error('Reorder lessons error:', ['message' => $e->getMessage()]);
            $this->dispatch('lesson-error', [
                'icon' => 'error',
                'message' => 'Gagal mengurutkan materi: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.course-detail', [
            'lessonsCount' => count($this->lessons),
            'groupedLessons' => $this->getLessonsBySection(),
        ])->layout('layouts.app');
    }
}
