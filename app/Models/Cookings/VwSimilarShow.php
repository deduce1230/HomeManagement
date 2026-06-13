<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwSimilarShow extends Model
{
    protected $table = 'cooking.vw_similar_shows';
    protected $primaryKey = 'recipe_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
