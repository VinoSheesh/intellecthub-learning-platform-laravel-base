<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class ManageUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';
    public $statusFilter = '';

    protected $queryString = ['search', 'roleFilter', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatus($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
        }
    }

    public function addSubscription($userId, $days = 30)
    {
        // Validasi input agar tidak error jika user memasukkan huruf atau angka aneh.
        $days = (int) $days;
        if ($days <= 0) return;

        $user = User::find($userId);
        if ($user) {
            if ($user->subscription_until && Carbon::parse($user->subscription_until)->isFuture()) {
                $user->subscription_until = Carbon::parse($user->subscription_until)->addDays($days);
            } else {
                $user->subscription_until = now()->addDays($days);
            }
            $user->save();
        }
    }

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->roleFilter) {
            // Kita asumsikan roleFilter adalah nama Role Spatie, e.g. "SuperAdmin", "Student"
            $query->whereHas('roles', function($q) {
                $q->where('name', $this->roleFilter);
            });
        }

        if ($this->statusFilter) {
            if ($this->statusFilter == 'active') {
                $query->where('subscription_until', '>=', now()->toDateString());
            } elseif ($this->statusFilter == 'expired') {
                $query->where('subscription_until', '<', now()->toDateString())
                      ->whereNotNull('subscription_until');
            } elseif ($this->statusFilter == 'basic') {
                $query->whereNull('subscription_until');
            }
        }

        $users = $query->latest()->paginate(10);

        // Hitung Statistik
        $totalUsers = User::count();
        $activeSubscribers = User::where('subscription_until', '>=', now()->toDateString())->count();
        $expiredSubscribers = User::where('subscription_until', '<', now()->toDateString())->whereNotNull('subscription_until')->count();

        return view('livewire.manage-users', compact('users', 'totalUsers', 'activeSubscribers', 'expiredSubscribers'))
            ->layout('layouts.app');
    }
}
