<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BillDetails
 *
 * @property int $bill_details_id
 * @property int $bill_id
 * @property string $item_description
 * @property int $quantity
 * @property string $condition
 * @property string $price
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Bill|null $bill
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereBillDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereItemDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BillDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillDetails extends Model
{
    use HasFactory;

    protected $table = 'bill_details';

    protected $primaryKey = 'bill_details_id';


    public $timestamps = false;

    protected $fillable = [
        'bill_id',
        'item_description',
        'quantity',
        'condition',
        'price',
    ];


    public function bill() {
        return $this->belongsTo(Bill::class);
    }
}
