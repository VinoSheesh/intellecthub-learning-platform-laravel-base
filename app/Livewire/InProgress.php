<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class Inprogress extends Component
{
    public function render()
    {
        $courses = Courses::with(['category', 'enrollments' => function($q) {
            $q->where('user_id', Auth::id());
        }])
        ->where('is_published', true)
        ->whereHas('enrollments', function ($q) {
            $q->where('user_id', Auth::id())
              ->where('status', 'active');
        })
        ->get();

        return view('livewire.inprogress', compact('courses'))->layout('layouts.app');
    }
}
