<?php

namespace App\Models\Stocks;

use Illuminate\Database\Eloquent\Model;

class StockList extends Model
{
    protected $table = 'stock.lists';
    protected $primaryKey = 'id';

     // 割り当て許可
    protected $fillable = [
        'cat_id',
        'stock_name',
        'expiry_at',
        'amount',
    ];
}
