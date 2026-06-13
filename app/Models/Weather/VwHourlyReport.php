<?php

namespace App\Models\Weather;

use Illuminate\Database\Eloquent\Model;

class VwHourlyReport extends Model
{
    protected $table = 'weather.vw_weather_hourly_report';
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
