<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = 'cooking.food_types';
    protected $primaryKey = 'type_id';

     // 割り当て許可
    protected $fillable = [
        'type_id',
        'type_nm'
    ];

}
