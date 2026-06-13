<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo.lists';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'cat_id',
        'mission',
        'alert_days',
        'flg_fin',
        'fin_until',
        'rep_user_id',
        'ref_url',
    ];
}
