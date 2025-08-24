<?php

namespace App\Livewire;

use Livewire\Component;

class InProgress extends Component
{
    public function render()
    {
        return view('livewire.in-progress')->layout('layouts.app');
    }
}
