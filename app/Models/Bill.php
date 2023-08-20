<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bill
 *
 * @property int $bill_id
 * @property int $order_id
 * @property string $bill_no
 * @property string $order_no
 * @property string $biller
 * @property string $billing_address
 * @property string $date
 * @property string $shipping
 * @property string $subtotal
 * @property string $taxes
 * @property string $total
 * @property string $payment_methods
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BillDetails> $bill_details
 * @property-read int|null $bill_details_count
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereBillNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereBiller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill wherePaymentMethods($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereTaxes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
