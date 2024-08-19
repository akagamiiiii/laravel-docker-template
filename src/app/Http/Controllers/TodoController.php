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

        //section9追加内容
        return view('todo.index', ['todos' => $todos]);
    }

    //section11追加内容
    public function create()
    {
        return view('todo.create');
    }   

    //section13追加内容
    public function store(Request $request)
    {
        //$content = $request->input('content'); 
        //dd($request);
        //section14追加内容
        $inputs = $request->all(); 
        //dd($inputs);
        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo(); 
        //dd($todo);
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を一括で代入
        //$todo->content = $inputs['content'];
        $todo->fill($inputs);
        //dd($todo);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index');
    }
}
