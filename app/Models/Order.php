<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='orders';
    protected $fillable=[
        'voucherNo',
        'qty',
        'total',
        'paymentSlip',
        'payment_id',
        'item_id',
        'category_id',
        'user_id'
    ];
}
