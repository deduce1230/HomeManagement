<?php

namespace App\Models\Communications;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $table = 'communicate.lines';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'line_date',
        'line_time',
        'line_text',
        'user_id_from',
        'user_id_to',
        'read',
    ];
}
