<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class Favorites extends Component
{
    #[On('refresh-favorites')]
    public function refresh() {}

    public function render()
    {
        $courses = Courses::with(['category', 'enrollments' => function($q) {
            $q->where('user_id', Auth::id());
        }])
        ->where('is_published', true)
        ->whereHas('enrollments', function ($q) {
            $q->where('user_id', Auth::id())
              ->where('is_favorite', true);
        })
        ->get();

        return view('livewire.favorites', compact('courses'))->layout('layouts.app');
    }
}
