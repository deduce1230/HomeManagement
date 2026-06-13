<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwMealKindDay extends Model
{
    protected $table = 'cooking.vw_meal_kinds_days';
    protected $primaryKey = '';//ここに書いた項目は数値化されます

     // 割り当て許可
    protected $fillable = [
    ];
}
