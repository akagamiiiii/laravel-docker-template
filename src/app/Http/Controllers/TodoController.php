<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //section7追加内容
    public function index()
    {
        //dd('Hello World!');
        return view('todo.index');
    }
}
