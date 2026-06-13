<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class MealKind extends Model
{
    protected $table = 'cooking.meal_kinds';
    protected $primaryKey = 'kind_id';

     // 割り当て許可
    protected $fillable = [
        'kind_id',
        'kind_nm'
    ];
}
