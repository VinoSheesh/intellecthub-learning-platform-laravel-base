<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Categories;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

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
        'thumbnail' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id'
    ];

    public function mount()
    {
        // Menggunakan get() untuk mengambil data kategori
        $this->categories = Categories::all();
    }

    public function save()
    {
        $this->validate();

        $path = $this->thumbnail->store('thumbnails', 'public');
        
        Courses::create([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => 'storage/'.$path,
            'category_id' => $this->category_id,
        ]);

        $this->reset();

        return redirect()->route('allcourse')->with('success', 'Kursus berhasil ditambahkan!');
    }

    public function render()
    {
        // Memastikan categories selalu memiliki nilai
        $this->categories = $this->categories ?? Categories::all();

        return view('livewire.create-course', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }
}
