<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // protected $fillable = ['title', 'content']; // DB 필드 요소에 접근

    protected $guarded = []; // 전체 필드 요소에 접근 가능
}
