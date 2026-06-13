<?php

namespace App\Models\Communications;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    protected $table = 'communicate.endpoints';
    protected $primaryKey = 'rec_id';

     // 割り当て許可
    protected $fillable = [
        'rec_id',
        'user_id',
        'endpoint',
        'token',
        'public_key',
    ];
}
