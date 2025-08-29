<?php

namespace App\Livewire;

use Livewire\Component;

class CourseInfo extends Component
{
    public function render()
    {
        return view('livewire.course-info')->layout('layouts.app');
    }
}
