<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
