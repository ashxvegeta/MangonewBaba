<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'orders_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'price'
    ];

    // Relationship with Product
    //Product::class → This means the relationship is with the products table (via the Product model).
    //'prod_id' → This is the foreign key in the order_items table.
    //'id' → This is the primary key in the products table.
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
