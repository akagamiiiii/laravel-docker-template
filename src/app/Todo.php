<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//section22追加内容
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    //section22追加内容
    use SoftDeletes;
    
    //section8追加内容
    protected $table = 'todos';

    //section14追加内容
    protected $fillable = [
        'content',
    ];
}
