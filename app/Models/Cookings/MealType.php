<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    protected $table = 'cooking.meal_types';
    protected $primaryKey = 'meal_id';

     // 割り当て許可
    protected $fillable = [
        'meal_id',
        'meal_nm'
    ];
}
