<?php

namespace App\Livewire;

use Livewire\Component;

class ManageCourses extends Component
{
    public function render()
    {
        return view('livewire.manage-courses')->layout('layouts.app');
    }
}
