<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Model;

class RecordGroup extends Model
{
    protected $table = 'diary.record_groups';
    protected $primaryKey = 'id';

     // 割り当て許可
    protected $fillable = [
        'id',
        'group_name',
    ];
}
