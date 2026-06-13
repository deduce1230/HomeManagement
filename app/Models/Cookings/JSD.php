<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class JSD extends Model
{
    protected $table = 'cooking.jsd';
    protected $primaryKey = 'jsd_id';

     // 割り当て許可
    protected $fillable = [
        'jsd_id',
        'name',
        'calories',
        'protein',
        'fat',
        'carbohydrate',
        'sugar',
        'diaetary_fiber',
        'salt',
    ];

}
