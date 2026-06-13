<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwAlert extends Model
{
    protected $table = 'vw_alerts';

    // 主キーがない時の記述方法
    protected $primaryKey = null;
    public $incrementing = false;

     // 割り当て許可
    protected $fillable = [
        'alert_date',
        'limit_date',
        'contents',
        'url',
    ];
}
