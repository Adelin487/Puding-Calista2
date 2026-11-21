<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Menampilkan daftar pesanan.
    
    public function index(Request $request)
    {
        $query = Order::with('items')->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('whatsapp', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->status !== 'Semua') {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10)->withQueryString();
        $totalOrders = Order::count();

        return view('admin.orders.index', compact('orders', 'totalOrders'));
    }

    // Menampilkan detail pesanan.
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    // Memperbarui status pesanan.
    
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:Diproses,Terkirim,Selesai'],
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}