<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
