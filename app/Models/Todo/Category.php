<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'todo.categories';
    protected $primaryKey = 'cat_id';

     // 割り当て許可
    protected $fillable = [
    ];
}
