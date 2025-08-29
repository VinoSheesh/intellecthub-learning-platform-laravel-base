<?php

namespace App\Livewire;

use Livewire\Component;

class CreateCourse extends Component
{
    public function render()
    {
        return view('livewire.create-course')->layout('layouts.app');
    }
}
