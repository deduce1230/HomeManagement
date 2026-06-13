<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;

class VwHealth extends Model
{
    protected $table = 'diary.vw_health';
    protected $primaryKey = 'virtual_id';

     // 割り当て許可
    protected $fillable = [
        'virtual_id',
    ];
}
