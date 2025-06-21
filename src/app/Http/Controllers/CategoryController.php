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
}
