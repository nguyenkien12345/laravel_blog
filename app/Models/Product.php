<?php

namespace App\Models;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    public function searchableAs()
    {
        return 'products';
    }

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'currency',
        'description',
        'sales',
        'stock'
    ];

    protected $hidden = [];

    protected $casts = [
        'price' => Money::class
    ];
}
