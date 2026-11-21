<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoClosedDate extends Model
{
    protected $fillable = [
        'closed_date',
    ];

    protected function casts(): array
    {
        return [
            'closed_date' => 'date',
        ];
    }
}