<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'amount',
        'currency',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
