<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;

class Dashboard extends Component
{
    public $totalUsers;

    public function mount()
    {
        // Ambil data dari database
        $this->totalUsers = User::count();
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
