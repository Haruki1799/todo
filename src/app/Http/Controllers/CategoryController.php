<?php

namespace App\Http\Controllers;

use App\Models\Category;
use BadFunctionCallException;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category', compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
    $category = $request->only(['name']);
    Category::create($category);

    session()->flash('message', 'カテゴリを作成しました');

        return redirect('/categories');
    }
    public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);

        session()->flash('message', 'カテゴリを更新しました');

        return redirect('/categories');
    }
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        session()->flash('message', 'カテゴリを削除しました');

        return redirect('/categories');
    }
}
