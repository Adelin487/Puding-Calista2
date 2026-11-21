<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    private array $closedDates = [
        '2026-11-10',
        '2026-11-15',
        '2026-12-25',
    ];

    private array $availableTimes = [
        '10:00 WIB',
        '11:00 WIB',
        '12:00 WIB',
        '13:00 WIB',
        '14:00 WIB',
        '15:00 WIB',
        '16:00 WIB',
        '17:00 WIB',
        '18:00 WIB',
        '19:00 WIB',
        '20:00 WIB',
    ];

    public function index(Request $request)
    {
        $menuItems = MenuItem::where('is_available', true)
            ->orderBy('id')
            ->get();

        $selectedProduct = null;

        if ($request->filled('produk')) {
            $selectedProduct = MenuItem::where('slug', $request->produk)
                ->where('is_available', true)
                ->first();
        }

        return view('customer.order', compact(
            'menuItems',
            'selectedProduct'
        ) + [
            'closedDates' => $this->closedDates,
            'availableTimes' => $this->availableTimes,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'min:2', 'max:255'],
            'whatsapp' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $digits = preg_replace('/\D/', '', $value);

                    if (strlen($digits) < 12) {
                        $fail('Nomor WhatsApp tidak valid (minimal 12 digit).');
                    }
                },
            ],
            'tanggal' => ['required', 'date', 'after_or_equal:today'],
            'waktu' => ['required', 'in:' . implode(',', $this->availableTimes)],
            'catatan' => ['nullable', 'string'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.menu_item_id' => [
                'required',
                'integer',
                'distinct',
                'exists:menu_items,id',
            ],
            'items.*.jumlah' => [
                'required',
                'integer',
                'min:1',
                'max:20',
            ],
        ]);

        if (in_array($validated['tanggal'], $this->closedDates, true)) {
            throw ValidationException::withMessages([
                'tanggal' => 'Maaf, kuota pemesanan untuk tanggal ini sudah penuh/ditutup oleh Admin. Silakan pilih tanggal lain.',
            ]);
        }

        $order = DB::transaction(function () use ($validated) {
            $totalHarga = 0;
            $orderItems = [];

            foreach ($validated['items'] as $item) {
                $menu = MenuItem::where('id', $item['menu_item_id'])
                    ->where('is_available', true)
                    ->first();

                if (!$menu) {
                    throw ValidationException::withMessages([
                        'items' => 'Salah satu menu puding sudah tidak tersedia. Silakan periksa kembali pilihan menu.',
                    ]);
                }

                $subtotal = $menu->price * $item['jumlah'];
                $totalHarga += $subtotal;

                $orderItems[] = [
                    'menu_item_id' => $menu->id,
                    'product_name' => $menu->name,
                    'product_price' => $menu->price,
                    'jumlah' => $item['jumlah'],
                ];
            }

            $order = Order::create([
                'invoice_id' => 'CLS-' . now()->format('ymd') . '-' . strtoupper(Str::random(4)),
                'nama' => trim($validated['nama']),
                'whatsapp' => trim($validated['whatsapp']),
                'tanggal' => $validated['tanggal'],
                'waktu' => $validated['waktu'],
                'catatan' => $validated['catatan'] ?? null,
                'total_harga' => $totalHarga,
                'status' => 'Menunggu Konfirmasi',
            ]);

            $order->items()->createMany($orderItems);

            return $order;
        });

        session()->put('order_id', $order->id);

        return redirect()->route('payment.index');
    }
}