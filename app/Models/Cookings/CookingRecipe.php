<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class CookingRecipe extends Model
{
    protected $table = 'cooking.cooking_recipes';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'recipe_id',
        'ingredients',
        'food_id',
        'amount',
        'for_num',
    ];
}
