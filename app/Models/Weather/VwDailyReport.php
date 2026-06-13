<?php

namespace App\Models\Weather;

use Illuminate\Database\Eloquent\Model;

class VwDailyReport extends Model
{
    protected $table = 'weather.vw_weather_daily_report';
//    protected $primaryKey = 'wea_date';

     // 割り当て許可
//    protected $fillable = [
//        'wea_date',
//        'day_weather',
//        'min_temp',
//        'max_temp'
//    ];
    protected $fillable = [
    ];
}
