<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Categories;
use Livewire\WithFileUploads;

class CreateCourse extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $thumbnail;
    public $category_id;
    public $categories;
    public $is_published = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'required|image|max:2048',
        'category_id' => 'required|exists:categories,id',
        'is_published' => 'boolean'
    ];

    public function mount()
    {
        $this->categories = Categories::all();
    }

    public function save()
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

        if (!$this->thumbnail) {
            $this->addError('thumbnail', 'Thumbnail harus diupload');
            $this->dispatch('swal:error', [
                'title' => 'Gambar Hilang!',
                'text' => 'Mohon unggah gambar kursus terlebih dahulu.'
            ]);
            return;
        }

        $path = $this->thumbnail->store('thumbnails', 'public');

        Courses::create([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => 'storage/' . $path,
            'category_id' => $this->category_id,
            'is_published' => false, // Override always to draft on creation
        ]);

        session()->flash('success', 'Kursus berhasil ditambahkan!');
        $this->dispatch('courseCreated');

        // Note: No immediate redirect here. The frontend SweetAlert handler will redirect.
    }

    public function render()
    {
        $this->categories = $this->categories ?? Categories::all();

        return view('livewire.create-course', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }
}
