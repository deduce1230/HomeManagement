<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class VwCalendar extends Model
{
    protected $table = 'diary.vw_calendar_shows';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'start_date',
        'start_time',
        'end_date',
        'event',
        'owner',
    ];
}
