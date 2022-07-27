<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class TodoController extends Controller
{
    public function __construct() {
        // get route name current
        $routeName = Route::currentRouteName();
        // explode: cắt chuỗi chõ dấu chấm
        $arr = explode('.', $routeName);
        // arr_map: lặp qua rồi in hoa chữ đầu của mỗi index
        $arr = array_map('ucfirst', $arr);
        // implode: biến index của mảng thành chuỗi nối vs nhau cách nhau = /
        $title = implode(' / ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        $data = Todo::orderBy('created_at', 'desc')->get();

        return view('todo.index', [
           'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();  

//        Todo::create($request);

        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', [
            'each' => $todo,
        ]);
    }

    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update(
            $request->except('_token','_method'),
        );

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
