<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class FoodAliase extends Model
{
    protected $table = 'cooking.food_aliases';
    protected $primaryKey = 'alias_id';

     // 割り当て許可
    protected $fillable = [
        'alias_id',
        'food_id',
        'value',
    ];
}
