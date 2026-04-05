<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class Completed extends Component
{
    public function render()
    {
        $courses = Courses::with(['category', 'enrollments' => function($q) {
            $q->where('user_id', Auth::id());
        }])
        ->whereHas('enrollments', function ($q) {
            $q->where('user_id', Auth::id())
              ->where('status', 'completed');
        })
        ->get();

        return view('livewire.completed', compact('courses'))->layout('layouts.app');
    }
}
