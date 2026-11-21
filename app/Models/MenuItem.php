<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'price',
        'description',
        'image',
        'badge',
        'size',
        'popular',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'popular' => 'boolean',
            'is_available' => 'boolean',
        ];
    }
}