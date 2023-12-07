<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_image', 'product_price', 'product_description', 'product_quantity', 'product_status', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
   

    // public function product_carts()
    // {
    //     return $this->hasMany(Product_cart::class, 'product_id');
    // }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
