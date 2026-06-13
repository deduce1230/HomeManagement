<?php

namespace App\Models\Stocks;

use Illuminate\Database\Eloquent\Model;

class VwStock extends Model
{
    protected $table = 'stock.vw_stocks';
    protected $primaryKey = 'id';

     // 割り当て許可
    protected $fillable = [
        'id',
        'cat_id',
        'cat_name',
        'stock_name',
        'expiry_at',
        'amount',
    ];
}
