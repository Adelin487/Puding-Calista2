<?php

namespace App\Http\Controllers;

use App\Models\Order;

class SuccessController extends Controller
{
    public function index()
    {
        // Mengambil ID pesanan dari session setelah pembayaran.
        $orderId = session('order_id');

        if (!$orderId) {
            return redirect()
                ->route('order.index')
                ->with('error', 'Data pesanan tidak ditemukan. Silakan lakukan pemesanan kembali.');
        }

        // Mengambil data pesanan beserta seluruh menu yang dipesan.
        $order = Order::with('items')->find($orderId);

        if (!$order) {
            return redirect()
                ->route('order.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('customer.success', compact('order'));
    }
}