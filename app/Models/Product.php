<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'description',
        // 'brand_id',
        // 'category_id',
        
    ];
    // protected $primaryKey = 'product_id';
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // public function categories()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'category_id');
    // }
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    // }
}
