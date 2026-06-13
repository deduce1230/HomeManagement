<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'cooking.records';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'meal_date',
        'meal_id',
        'recipe_id',
        'flg_sch',
        'score',
        'memo',
        'eater_id',
    ];
}
