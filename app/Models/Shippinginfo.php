<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippinginfo extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'user_name', 'phone_number', 'city_name'];
}
