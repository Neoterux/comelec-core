<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingCartDetails
 *
 * @property-read \App\Models\ShoppingCart|null $cart
 * @property-read \App\Models\Item|null $item
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartDetails query()
 * @mixin \Eloquent
 */
class ShoppingCartDetails extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart_content';

    protected $primaryKey = 'content_id';

    protected $fillable = [
        'item_id',
        'cart_id',
        'quantity',
        'created_at',
        'updated_at',
    ];

    public function cart() {
        return $this->belongsTo(ShoppingCart::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
