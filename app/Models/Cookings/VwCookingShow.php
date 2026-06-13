<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class VwCookingShow extends Model
{
    protected $table = 'cooking.vw_cooking_shows';
    protected $primaryKey = 'virtual_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
