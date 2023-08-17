<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'user_name', 'shipping_phonenumber', 'shipping_city', 'total_price','created_at','update_at','status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class, 'order_id', 'id');
    }
}
