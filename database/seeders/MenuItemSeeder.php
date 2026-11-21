<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'slug' => 'puding-tiramisu',
                'name' => 'Puding Tiramisu',
                'price' => 150000,
                'description' => 'Lapisan biskuit ladyfinger lembut, perpaduan kopi espresso aromatik dan krim mascarpone lumer yang tidak enek.',
                'image' => 'images/03-puding-tiramisu.jpg',
                'badge' => 'Favorit Pelanggan',
                'size' => 'Loyang 20cm (8-10 Potong)',
                'popular' => true,
            ],
            [
                'slug' => 'puding-nutella-oreo',
                'name' => 'Puding Nutella Oreo',
                'price' => 200000,
                'description' => 'Cokelat hazelnut premium Nutella asli yang pekat berpadu remah biskuit Oreo gurih di setiap gigitan.',
                'image' => 'images/05-puding-nutella-oreo.jpg',
                'badge' => 'Best Seller',
                'size' => 'Loyang 22cm (10-12 Potong)',
                'popular' => true,
            ],
            [
                'slug' => 'puding-buah-segar',
                'name' => 'Puding Buah Segar',
                'price' => 175000,
                'description' => 'Puding kaca jernih dengan topping melimpah potongan buah stroberi, kiwi, anggur, dan jeruk segar manis alami.',
                'image' => 'images/10-puding-buah-variasi.jpg',
                'badge' => 'Segar & Sehat',
                'size' => 'Loyang 20cm (8-10 Potong)',
                'popular' => false,
            ],
            [
                'slug' => 'puding-belgia-chocolate',
                'name' => 'Puding Cokelat Belgia',
                'price' => 165000,
                'description' => 'Cokelat hitam Belgia 70% dengan tekstur ultra-silky, dilengkapi fla susu vanila kental racikan istimewa.',
                'image' => 'images/11-puding-kreasi.jpg',
                'badge' => 'Rich & Silky',
                'size' => 'Loyang 20cm (8-10 Potong)',
                'popular' => false,
            ],
            [
                'slug' => 'puding-mango-sago',
                'name' => 'Puding Mangga Sago',
                'price' => 155000,
                'description' => 'Daging mangga harum manis asli dipadukan dengan bulir sagu mutiara kenyal serta saus krim kelapa gurih lembut.',
                'image' => 'images/12-mango-creamy.jpg',
                'badge' => 'Menu Musiman',
                'size' => 'Loyang 20cm (8-10 Potong)',
                'popular' => false,
            ],
            [
                'slug' => 'puding-lumut-pandan',
                'name' => 'Puding Lumut Pandan Butter',
                'price' => 140000,
                'description' => 'Resep warisan keluarga dengan sari daun pandan & suji asli, berpadu lapisan puding mentega legit wangi.',
                'image' => 'images/08-puding-lapis.jpg',
                'badge' => 'Klasik Autentik',
                'size' => 'Loyang 20cm (8-10 Potong)',
                'popular' => false,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}