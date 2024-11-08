<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city','state', 'zip', 'payment_method', 'products_id', 'total_price', 'order_status', 'payment_status','review', 'notes', 'coupon'  // define your fillable fields here.
    ];
}
