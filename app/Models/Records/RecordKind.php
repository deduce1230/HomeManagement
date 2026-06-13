<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;

class RecordKind extends Model
{
    protected $table = 'diary.record_kinds';
    protected $primaryKey = 'rec_kind';

     // 割り当て許可
    protected $fillable = [
        'rec_kind',
        'kind_name',
        'def_unit_id',
    ];
}
