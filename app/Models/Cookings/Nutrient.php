<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class Nutrient extends Model
{
    protected $table = 'cooking.nutrients';
    protected $primaryKey = 'nut_id';

     // 割り当て許可
    protected $fillable = [
        'nut_id',
        'name_jp',
        'name_en',
        'memo',
        'default_unit',
    ];

}
