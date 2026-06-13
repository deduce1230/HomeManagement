<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class FoodList extends Model
{
    protected $table = 'cooking.food_lists';
    protected $primaryKey = 'list_id';

     // 割り当て許可
    protected $fillable = [
        'list_id',
        'list_nm',
        'list_type',
    ];
}
