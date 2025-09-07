<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;

class ShowCourse extends Component
{


    public $course;

    public function mount($id)
    {
        $this->course = Courses::with('category')->findorFail($id);
    }

    public function render()
    {
        return view('livewire.show-course')->layout('layouts.app');
    }
}
