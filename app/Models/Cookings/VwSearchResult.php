<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwSearchResult extends Model
{
    //protected $table = 'cooking.vw_search_result_03';
    //protected $table = 'cooking.vw_search_result_04';
    //protected $table = 'cooking.vw_search_result_04';
    //protected $table = 'cooking.vw_search_result_05';
    protected $table = 'cooking.vw_search_result_06';
    protected $primaryKey = 'recipe_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
