<?php

namespace App\Livewire;

use Livewire\Component;

class Completed extends Component
{
    public function render()
    {
        return view('livewire.completed')->layout('layouts.app');
    }
}
