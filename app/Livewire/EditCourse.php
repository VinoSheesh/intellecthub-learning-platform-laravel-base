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
    public $is_published = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',
        'is_published' => 'boolean'
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
        $this->is_published = $course->is_published;
    }

    public function update()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('swal:error', [
                'title' => 'Input Tidak Valid!',
                'text' => 'Terdapat form yang belum diisi dengan benar. Silakan periksa kembali.'
            ]);
            throw $e;
        }

        $course = Courses::find($this->course_id);

        if ($this->is_published && $course->lessons()->count() === 0) {
            $this->addError('is_published', 'Tidak dapat mempublikasikan kursus yang belum memiliki materi (lesson).');
            $this->dispatch('swal:error', [
                'title' => 'Gagal Publikasi!',
                'text' => 'Kursus harus memiliki minimal 1 materi sebelum dapat dipublikasikan.'
            ]);
            return;
        }

        $path = $course->thumbnail;
        if ($this->thumbnail) {
            // Hapus thumbnail lama jika ada file baru dan bukan default/null
            if ($course->thumbnail && file_exists(public_path($course->thumbnail)) && !is_dir(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }
            $path = 'storage/' . $this->thumbnail->store('thumbnails', 'public');
        }

        $course->update([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $path,
            'category_id' => $this->category_id,
            'is_published' => $this->is_published,
        ]);

        session()->flash('success', 'Kursus berhasil diperbarui!');
        $this->dispatch('courseUpdated');
    }

    public function render()
    {
        return view('livewire.edit-course', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }
}
