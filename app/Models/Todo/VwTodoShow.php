<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Model;

class VwTodoShow extends Model
{
    protected $table = 'todo.lists';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'cat_id',
        'mission',
        'flg_fin',
        'flg_until',
        'rep_user_id',
        'until_at',
        'alert_days',
        'ref_url',
    ];
}
