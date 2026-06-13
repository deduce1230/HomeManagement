<?php

namespace App\Models\Tweets;

use Illuminate\Database\Eloquent\Model;

class VwTweetShow extends Model
{
    protected $table = 'diary.vw_diary_shows';
    protected $primaryKey = 'virtual_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
