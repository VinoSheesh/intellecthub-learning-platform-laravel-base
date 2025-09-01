<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionTransaction extends Component
{
    protected $listeners = ['paymentSuccess', 'paymentPending'];

    public function showSnap()
    {
        if (!session('snap_token')) {
            session()->flash('error', 'Token pembayaran tidak ditemukan');
            return;
        }
        $this->dispatch('showSnap');
    }

    public function paymentSuccess($result = null)
    {
        try {
            $user = Auth::user();
            $plan = session('plan');
            
            // Hitung tanggal berakhir
            $start = Carbon::now();
            $end = match($plan) {
                '1_month' => $start->copy()->addMonth(),
                '3_month' => $start->copy()->addMonths(3),
                '6_month' => $start->copy()->addMonths(6),
                '1_year' => $start->copy()->addYear(),
                default => $start,
            };

            // Simpan ke database
            $subscription = Subscription::create([
                'user_id' => $user->id,
                'plan' => $plan, // Gunakan plan langsung tanpa konversi
                'starts_at' => $start,
                'ends_at' => $end,
            ]);

            // Debug log
            \Log::info('Subscription created:', $subscription->toArray());

            session()->flash('success', 'Berhasil berlangganan! Selamat menikmati layanan kami.');
            session()->forget(['snap_token', 'plan', 'price']);
            
            return redirect()->route('dashboard')->with('subscription_updated', true);
        } catch (\Exception $e) {
            \Log::error('Payment Error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memproses pembayaran');
            return null;
        }
    }

    public function render()
    {
        return view('livewire.subscription-transaction')->layout('layouts.app');
    }
}
