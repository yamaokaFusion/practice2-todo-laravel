<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 保存できるカラムを指定
    protected $fillable = [
        'name',
        'message'
    ];
}
