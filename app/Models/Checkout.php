<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Checkout extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'payment_method', 'total price', 'arrive date', 'discount_id', 'address', 'zipcode'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function discount()
    // {
    //     return $this->belongsTo(Discount::class, 'discount_id');
    // }

    // public function carts()
    // {
    //     return $this->belongsTo(Cart::class, 'cart_id');
    // }


}