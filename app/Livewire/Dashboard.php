<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $user;
    public $role;

    public function mount()
    {
        $this->user = Auth::user();
        $this->role = $this->user->role; 
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
