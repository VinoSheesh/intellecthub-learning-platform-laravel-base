<?php

namespace App\Livewire;

use Livewire\Component;

class ShowCourse extends Component
{
    public function render()
    {
        return view('livewire.show-course')->layout('layouts.app');
    }
}
