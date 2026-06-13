<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class Cooking extends Model
{
    protected $table = 'cooking.cookings';
    protected $primaryKey = 'recipe_id';

     // 割り当て許可
    protected $fillable = [
        'recipe_id',
        'recipe_nm',
        'ref_url',
        'recommend',
        'dish_id',
        'kind_id',
        'cat_id'
    ];
}
