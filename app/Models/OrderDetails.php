<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderDetails
 *
 * @property int $order_details_id
 * @property int $item_id
 * @property int $order_id
 * @property string $item_name
 * @property string $unit_price
 * @property string $unit
 * @property int $quantity
 * @property string $tax
 * @property string $subtotal
 * @property string $discount
 * @property-read \App\Models\Item|null $item
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereItemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereOrderDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetails whereUnitPrice($value)
 * @mixin \Eloquent
 */
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
