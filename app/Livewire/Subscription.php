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
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $user = Auth::user();

        // Buat payload transaksi
        $params = [
            'transaction_details' => [
                'order_id' => uniqid('ORDER-'),
                'gross_amount' => $price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Redirect ke halaman transaksi (atau tampilkan Snap popup)
        session(['snap_token' => $snapToken, 'plan' => $plan, 'price' => $price]);
        return redirect()->route('subscriptiontransaction');
    }

    public function render()
    {
        return view('livewire.subscription')->layout('layouts.app');
    }
}
