<?php

namespace App\Livewire;

use Livewire\Component;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;

class Subscription extends Component
{

    public function pay($plan, $price)
    {
        // Pastikan format plan konsisten
        $validPlans = ['1_month', '3_month', '6_month', '1_year'];
        if (!in_array($plan, $validPlans)) {
            session()->flash('error', 'Paket tidak valid');
            return;
        }

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $user = Auth::user();

        // Buat payload transaksi
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => $price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => $plan,
                    'price' => $price,
                    'quantity' => 1,
                    'name' => "Paket $plan",
                ]
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            session(['snap_token' => $snapToken, 'plan' => $plan, 'price' => $price]);
            return redirect()->route('subscriptiontransaction');
        } catch (\Exception $e) {
            \Log::error('Midtrans Error: ' . $e->getMessage());
            session()->flash('error', 'Gagal memproses pembayaran');
            return back();
        }
    }

    public function render()
    {
        return view('livewire.subscription')->layout('layouts.app');
    }
}
