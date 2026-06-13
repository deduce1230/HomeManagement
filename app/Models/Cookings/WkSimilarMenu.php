<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class WkSimilarMenu extends Model
{
    protected $table = 'cooking.wk_similar_menus';
    //--主キーが複合の場合、「public $incrementing = false」が必要
    protected $primaryKey = ['recipe_id','rep_user_id'];
    public $incrementing = false;

     // 割り当て許可
    protected $fillable = [
        'recipe_id',
        'rep_user_id',
        'similarity'
    ];
}
