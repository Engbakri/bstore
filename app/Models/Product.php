<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $table = "products";

    protected $fillable = [
        "product_name",
        "product_price",
        "product_description",
        "product_image",
        "product_size",
        "product_polciy"
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function toSearchableArray()
    {
        return [
            'product_name' => $this->product_price,
            'product_price' => $this->product_price,
            'product_size' => $this->product_size
        ];
    }
}
