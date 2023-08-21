<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $item_id
 * @property string $name
 * @property string $shortname
 * @property string $description
 * @property string $unit_price
 * @property string $unit
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $primaryKey = 'item_id';

    protected $fillable = [
        'name',
        'shortname',
        'description',
        'unit_price',
        'unit',
        'active',
        'created_at',
        'updated_at',
    ];
}
