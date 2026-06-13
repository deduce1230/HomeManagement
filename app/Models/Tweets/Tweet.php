<?php

namespace App\Models\Tweets;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'diary.tweets';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'tweet_date',
        'tweet',
        'ref_url',
        'rep_user_id',
        'hashtag',
    ];

}
