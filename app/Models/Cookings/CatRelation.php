<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class CatRelation extends Model
{
    protected $table = 'cooking.cat_relations';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'dish_id',
        'cat_id'
    ];
}
