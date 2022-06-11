<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name','parent_id'];
     
    public function scopeRoot($query)
    {
        $query->whereNull('parent_id');

    }

    
        public function children()
        {
            return $this->hasMany(Category::class, 'parent_id', 'id');
        }

        public function products()
        {
            return $this->belongsToMany(Product::class, 'product_categories');
        }
    

}
