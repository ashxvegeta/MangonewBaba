<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'city',
        'state',
        'status',
        'message',
        'tracking_no'
    ];


    // Relationship with OrderItem
    //each order has many order items
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}
