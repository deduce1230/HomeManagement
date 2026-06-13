<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;

class DiaryRecord extends Model
{
    protected $table = 'diary.records';
    protected $primaryKey = 'id';

     // 割り当て許可
    protected $fillable = [
        'id',
        'rec_date',
        'rec_kind',
        'rec_val',
        'rec_unit_id',
        'rep_user_id',
    ];
}
