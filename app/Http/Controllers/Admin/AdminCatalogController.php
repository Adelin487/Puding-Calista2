<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;

class AdminCatalogController extends Controller
{
    public function index()
    {
        $products = MenuItem::latest()->paginate(10);

        return view('admin.catalog.index', compact('products'));
    }


    public function update(\Illuminate\Http\Request $request, $id)
    {
        $product = \App\Models\MenuItem::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'size' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['name']);

        $slugExists = \App\Models\MenuItem::where('slug', $slug)
            ->where('id', '!=', $product->id)
            ->exists();

        if ($slugExists) {
            $slug .= '-' . $product->id;
        }

        $product->name = $validated['name'];
        $product->slug = $slug;
        $product->price = $validated['price'];
        $product->size = $validated['size'] ?? null;
        $product->description = $validated['description'] ?? null;
        $product->badge = $validated['badge'] ?? null;

        if ($request->hasFile('image')) {
            $oldImage = $product->image;

            $newImage = $request->file('image')
                ->store('products', 'public');

            $product->image = $newImage;

            if ($oldImage) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($oldImage);
            }
        }

        $product->save();

        return redirect()
            ->route('admin.catalog.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = MenuItem::findOrFail($id);

        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.catalog.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}