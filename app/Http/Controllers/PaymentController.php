<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index()
    {
        $orderId = session('order_id');

        if (!$orderId) {
            return redirect()
                ->route('order.index')
                ->with('error', 'Data pesanan tidak ditemukan. Silakan lakukan pemesanan kembali.');
        }

        $order = Order::with('items')->find($orderId);

        if (!$order) {
            return redirect()
                ->route('order.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        // Mempertahankan ID pesanan selama proses pembayaran.
        session()->put('order_id', $order->id);

        return view('customer.payment', compact('order'));
    }

    public function store(Request $request)
    {
        $orderId = session('order_id');

        if (!$orderId) {
            return redirect()->route('order.index')
                ->with('error', 'Sesi pesanan tidak ditemukan.');
        }

        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->route('order.index')
                ->with('error', 'Pesanan tidak ditemukan.');
        }

        $validated = $request->validate([
            'bukti_pembayaran' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ], [
            'bukti_pembayaran.required' => 'Silakan unggah bukti pembayaran terlebih dahulu.',
            'bukti_pembayaran.image' => 'File harus berupa gambar.',
            'bukti_pembayaran.mimes' => 'Format bukti pembayaran harus JPG, JPEG, PNG, atau WebP.',
            'bukti_pembayaran.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        $path = $request->file('bukti_pembayaran')
            ->store('bukti-pembayaran', 'public');

        $order->update([
            'bukti_bayar_url' => $path,
            'bukti_bayar_name' => $request->file('bukti_pembayaran')->getClientOriginalName(),
            'status' => 'Diproses',
        ]);

        return redirect()
            ->route('success.index')
            ->with('order_id', $order->id);
    }
}