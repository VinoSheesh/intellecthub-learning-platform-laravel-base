<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $user;
    public $role;
    public $subscription;

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->user = Auth::user();
        $this->role = $this->user->role;
        $this->subscription = Subscription::where('user_id', $this->user->id)
            ->where('ends_at', '>=', now())
            ->orderByDesc('ends_at')
            ->first();
    }

    public function render()
    {
        if(session('subscription_updated')) {
            $this->refreshData();
            session()->forget('subscription_updated');
        }
        
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
