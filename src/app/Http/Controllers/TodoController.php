<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')->get();
        $categories = Category::all();

        return view('index', compact('todos','categories'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['category_id','content']);
        Todo::create($todo);

        session()->flash('message','Todoを作成しました');

        return redirect('/');
    }

    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        session()->flash('message', 'Todoを更新しました');

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        session()->flash('message', 'Todoを削除しました');

        return redirect('/');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}

