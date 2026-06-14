<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'unit_id';

     // 割り当て許可
    protected $fillable = [
        'unit_id',
        'unit_name',
    ];
}
