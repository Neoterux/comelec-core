<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingCart
 *
 * @property int $cart_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShoppingCartDetails> $content
 * @property-read int|null $content_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereUserId($value)
 * @mixin \Eloquent
 */
class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart';
    protected $primaryKey = 'cart_id';


    protected $fillable = [
        'user_id',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function content() {
        return $this->hasMany(ShoppingCartDetails::class);
    }
}
