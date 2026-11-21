<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class CatalogController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::where('is_available', true)
            ->orderBy('id')
            ->get();

        return view('customer.catalog', compact('menuItems'));
    }
}