<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses as CoursesModel;
use App\Models\Categories;



class Courses extends Component
{
    public $search = '';
    public $category = '';
    public $categories;

    public function mount()
    {
        // Hanya load categories sekali saat component dimount
        $this->categories = Categories::all();
    }

    public function render()
    {
        // Query courses berdasarkan filter yang aktif
        $query = CoursesModel::with('category');

        // Filter berdasarkan category
        if (!empty($this->category)) {
            $query->where('category_id', $this->category);
        }

        // Filter berdasarkan search
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $courses = $query->get();

        return view('livewire.courses', compact('courses'))->layout('layouts.app');
    }

    // Optional: Method untuk reset filter
    public function resetFilters()
    {
        $this->search = '';
        $this->category = '';
    }
}
