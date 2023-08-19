<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart';
    protected $primaryKey = 'cart_id';


    protected $fillable = [
        'id_user',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function content() {
        return $this->hasMany(ShoppingCartDetails::class);
    }
}
