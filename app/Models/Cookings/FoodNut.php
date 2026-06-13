<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class FoodNut extends Model
{
    protected $table = 'cooking.food_nuts';
    //--主キーが複合の場合、「public $incrementing = false」が必要
    protected $primaryKey = ['food_id','nut_id'];
    public $incrementing = false;

     // 割り当て許可
    protected $fillable = [
        'food_id',
        'nut_id',
        'unit',
        'value',
        'order',
        'jsd_id',
    ];

}
