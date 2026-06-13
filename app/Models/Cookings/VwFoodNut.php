<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwFoodNut extends Model
{
    protected $table = 'cooking.vw_foods_nuts';
    //--主キーが複合の場合、「public $incrementing = false」が必要
    protected $primaryKey = ['food_id','nut_id'];
    public $incrementing = false;

//    protected $primaryKey = 'foodnut_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
