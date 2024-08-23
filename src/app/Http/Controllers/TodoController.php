<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
//section8追加内容
use App\Todo;

class TodoController extends Controller
{
    //section17追加内容
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    //section7追加内容
    public function index()
    {
        //section8追加内容
        //$todo = new Todo();
        $todos = $this->todo->all();
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
    public function store(TodoRequest $request)
    {
        //$content = $request->input('content'); 
        //dd($request);
        //section14追加内容
        $inputs = $request->all(); 
        //dd($inputs);
        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        //$todo = new Todo(); 
        //dd($todo);
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を一括で代入
        //$todo->content = $inputs['content'];
        $this->todo->fill($inputs);
        //dd($todo);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    //section16, 17追加内容
    public function show($id){
        $todo = $this->todo->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }

    //section18追加内容
    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    //section19追加内容
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all(); 
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.show', $todo->id);
    }
}
