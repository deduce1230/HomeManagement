<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    protected $table = 'cooking.meal_categorys';
    protected $primaryKey = 'cat_id';

     // 割り当て許可
    protected $fillable = [
        'cat_id',
        'cat_nm'
    ];
}
