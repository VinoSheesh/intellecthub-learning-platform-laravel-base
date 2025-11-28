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

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'required|image|max:2048',
        'category_id' => 'required|exists:categories,id'
    ];

    public function mount()
    {
        $this->categories = Categories::all();
    }

    public function save()
    {
        $this->validate();

        if (!$this->thumbnail) {
            $this->addError('thumbnail', 'Thumbnail harus diupload');
            return;
        }

        $path = $this->thumbnail->store('thumbnails', 'public');

        Courses::create([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => 'storage/' . $path,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Kursus berhasil ditambahkan!');
        $this->dispatch('courseCreated');

        $this->reset();
        return redirect()->route('allcourse');
    }

    public function render()
    {
        $this->categories = $this->categories ?? Categories::all();

        return view('livewire.create-course', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }
}
