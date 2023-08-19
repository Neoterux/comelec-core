<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
