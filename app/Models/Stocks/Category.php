<?php

namespace App\Models\Stocks;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'stock.categories';
    protected $primaryKey = 'cat_id';

     // 割り当て許可
    protected $fillable = [
        'cat_id',
        'cat_name',
    ];
}
