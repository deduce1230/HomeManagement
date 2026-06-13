<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwKindShow extends Model
{
    protected $table = 'cooking.vw_meal_kinds_days';
    protected $primaryKey = 'meal_date';

     // 割り当て許可
    protected $fillable = [
    ];
}
