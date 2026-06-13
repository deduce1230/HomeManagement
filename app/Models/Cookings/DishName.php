<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class DishName extends Model
{
    protected $table = 'cooking.dish_names';
    protected $primaryKey = 'dish_id';

     // 割り当て許可
    protected $fillable = [
        'dish_id',
        'dish_nm',
        'kind_id',
    ];
}
