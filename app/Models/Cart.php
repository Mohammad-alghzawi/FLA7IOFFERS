<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
  use HasFactory;
  // protected $fillable = ['user_id', 'quantity','total_price'];

  // public function product_carts ()
  // {
  //     return $this->hasMany(Product_cart::class, 'cart_id');
  // }

  // public function user()
  // {
  //     return $this->belongsTo(User::class, 'user_id');
  // }
  // public function checkout ()
  // {
  //     return $this->hasOne(Checkout::class, 'cart_id');
  // }



  protected $fillable = ['user_id', 'quantity', 'product_id', 'checkout_id'];
  public $timestamps = false;

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function checkouts()
  {
    return $this->belongsTo(Checkout::class, 'checkout_id');
  }
}