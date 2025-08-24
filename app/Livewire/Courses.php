<?php

namespace App\Livewire;

use Livewire\Component;



class Courses extends Component
{
    public $courses;

    public function mount() {
        $this->courses = \App\Models\Courses::all();
    }
    public function render()
    {
        return view('livewire.courses')->layout('layouts.app');
    }
}
