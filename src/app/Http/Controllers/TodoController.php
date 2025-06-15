<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
public function index()
{
    $todos = Todo::all();

    return view('index', compact('todos'));
}
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        session()->flash('message','Todoを作成しました');

        return redirect('/');
    }



}

