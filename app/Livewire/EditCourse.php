<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Categories;
use Livewire\WithFileUploads;

class EditCourse extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $thumbnail;
    public $category_id;
    public $categories;
    public $course_id;
    public $existing_thumbnail;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id'
    ];

    public function mount($id)
    {
        $this->categories = Categories::all();
        $course = Courses::find($id);

        if (!$course) {
            return redirect()->route('allcourse')->with('error', 'Kursus tidak ditemukan');
        }

        $this->course_id = $id;
        $this->title = $course->title;
        $this->description = $course->description;
        $this->category_id = $course->category_id;
        $this->existing_thumbnail = $course->thumbnail;
    }

    public function update()
    {
        $this->validate();

        $course = Courses::find($this->course_id);

        $path = $course->thumbnail;
        if ($this->thumbnail) {
            // Hapus thumbnail lama jika ada file baru
            if (file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }
            $path = 'storage/' . $this->thumbnail->store('thumbnails', 'public');
        }

        $course->update([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $path,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Kursus berhasil diperbarui!');
        $this->dispatch('courseUpdated');
        
        return redirect()->route('managecourses');
    }

    public function render()
    {
        return view('livewire.edit-course', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }
}
