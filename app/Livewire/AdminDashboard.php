<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Courses;
use App\Models\Categories;

class AdminDashboard extends Component
{
    public function render()
    {
        // Statistik Atas
        $totalUsers = User::count();
        $activeSubscribers = User::where('subscription_until', '>=', now()->toDateString())->count();
        $totalCourses = Courses::count();
        $totalCategories = Categories::count();

        // Aktivitas Terbaru
        $recentCourses = Courses::with('category')->latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();

        return view('livewire.admin-dashboard', compact(
            'totalUsers', 
            'activeSubscribers', 
            'totalCourses', 
            'totalCategories',
            'recentCourses',
            'recentUsers'
        ))->layout('layouts.app');
    }
}
