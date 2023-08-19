<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $primaryKey = 'order_details_id';

    protected $fillable = [
        'item_id',
        'order_id',
        'item_name',
        'unit_price',
        'unit',
        'quantity',
        'tax',
        'subtotal',
        'discount',

    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
