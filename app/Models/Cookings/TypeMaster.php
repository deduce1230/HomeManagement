<?php

namespace App\Models\Cookings;

use Illuminate\Database\Eloquent\Model;

class TypeMaster extends Model
{
    protected $table = 'cooking.type_masters';
    protected $primaryKey = 'master_id';

     // 割り当て許可
    protected $fillable = [
        'master_id',
        'type_id',
        'kind_id',
        'descript'
    ];
}
