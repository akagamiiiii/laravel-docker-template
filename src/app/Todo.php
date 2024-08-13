<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //section8追加内容
    protected $table = 'todos';

    //section14追加内容
    protected $fillable = [
        'content',
    ];
}
