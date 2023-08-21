<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CreditCard
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard query()
 * @mixin \Eloquent
 */
class CreditCard extends Model
{
    use HasFactory;

    protected $table = 'credit_card';
    protected $primaryKey = 'card_id';


    protected $fillable = [
        'user_id',
        'number',
        'nickname',
        'expiration_date',
        'ccv',
        'active',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
