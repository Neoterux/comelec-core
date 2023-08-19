<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'card_id',
        'user_id',
        'delivery_address',
        'order_no',
        'bill_address',
        'status',
        'total',
        'shipping_cost',
        'tracking_no',
        'was_cancelled',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function card() {
        return $this->belongsTo(CreditCard::class);
    }

}
