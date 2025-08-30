<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionTransaction extends Component
{
    protected $listeners = ['paymentSuccess'];

    public function showSnap()
    {
        session(['show_snap' => true]);
        $this->dispatch('$refresh'); // Refresh Livewire component
    }

    public function paymentSuccess($result)
    {
        $user = Auth::user();
        $plan = session('plan');
        $price = session('price');

        // Hitung tanggal berakhir
        $start = Carbon::now();
        switch ($plan) {
            case '1_month':
                $end = $start->copy()->addMonth();
                break;
            case '3_months':
                $end = $start->copy()->addMonths(3);
                break;
            case '6_months':
                $end = $start->copy()->addMonths(6);
                break;
            case '1_year':
                $end = $start->copy()->addYear();
                break;
            default:
                $end = $start;
        }

        // Simpan ke database
        Subscription::create([
            'user_id' => $user->id,
            'plan' => $plan,
            'starts_at' => $start,
            'ends_at' => $end,
        ]);

        // Bersihkan session
        session()->forget(['snap_token', 'plan', 'price', 'show_snap']);

        // Redirect ke dashboard
        return redirect()->route('dashboard')->with('success', 'Pembayaran berhasil! Langganan aktif.');
    }

    public function render()
    {
        return view('livewire.subscription-transaction')->layout('layouts.app');
    }
}
