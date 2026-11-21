<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PoSetting;
use App\Models\PoClosedDate;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminPoController extends Controller
{
    // Menampilkan halaman Jadwal PO
    public function index()
    {
        $setting = PoSetting::firstOrCreate(
            [],
            ['daily_quota' => 15]
        );

        $closedDates = PoClosedDate::orderBy('closed_date')
            ->get()
            ->map(function ($closedDate) {
                $orders = Order::with('items')
                    ->whereDate('tanggal', $closedDate->closed_date)
                    ->get();

                $closedDate->filled = $orders->sum(function ($order) {
                    return $order->items->sum('jumlah');
                });

                return $closedDate;
            });

        return view('admin.po.index', compact(
            'setting',
            'closedDates'
        ));
    }

    // Menyimpan kuota harian
    public function updateQuota(Request $request)
    {
        $validated = $request->validate([
            'daily_quota' => ['required', 'integer', 'min:1'],
        ]);

        $setting = PoSetting::firstOrCreate(
            [],
            ['daily_quota' => 15]
        );

        $setting->update([
            'daily_quota' => $validated['daily_quota'],
        ]);

        return redirect()->route('admin.po.index')
            ->with('success', 'Kuota harian berhasil diperbarui.');
    }

    // Menutup kuota pada tanggal tertentu
    public function closeDate(Request $request)
    {
        $validated = $request->validate([
            'closed_date' => ['required', 'date', 'after_or_equal:today'],
        ]);

        PoClosedDate::firstOrCreate([
            'closed_date' => $validated['closed_date'],
        ]);

        return redirect()->route('admin.po.index')
            ->with('success', 'Tanggal berhasil ditutup.');
    }

    // Membuka kembali kuota tanggal tertentu
    public function openDate($id)
    {
        $closedDate = PoClosedDate::findOrFail($id);

        $closedDate->delete();

        return redirect()->route('admin.po.index')
            ->with('success', 'Kuota tanggal berhasil dibuka kembali.');
    }
}