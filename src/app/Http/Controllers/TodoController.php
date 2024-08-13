<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//section8追加内容
use App\Todo;

class TodoController extends Controller
{
    //section7追加内容
    public function index()
    {
        //section8追加内容
        $todo = new Todo();
        $todos = $todo->all();
        //dd($todos);

        return view('todo.index');
    }
}
