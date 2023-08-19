<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bill';

    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'order_id',
        'bill_no',
        'order_no',
        'biller',
        'billing_address',
        'date',
        'shipping',
        'subtotal',
        'taxes',
        'total',
        'payment_method',
    ];


    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function bill_details() {
        return $this->hasMany(BillDetails::class);
    }
}
