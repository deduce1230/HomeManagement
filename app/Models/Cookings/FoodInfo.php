<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class FoodInfo extends Model
{
    protected $table = 'cooking.food_infos';
    protected $primaryKey = 'food_id';

     // 割り当て許可
    protected $fillable = [
        'food_id',
        'food_nm',
        'season_s',
        'season_e',
        'ref_url',
        'memo',
        'group',
        'group_nm',
    ];

}
