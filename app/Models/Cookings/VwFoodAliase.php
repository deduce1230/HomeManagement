<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwFoodAliase extends Model
{
    protected $table = 'cooking.vw_food_aliases';
    //--主キーが複合の場合、「public $incrementing = false」が必要
    protected $primaryKey = ['food_id','food_nm'];
    public $incrementing = false;

     // 割り当て許可
    protected $fillable = [
    ];
}
