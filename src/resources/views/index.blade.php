@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="Todo-form__message">
    @if ($errors->any())
    <div class="Todo-form__message--error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('message'))
    <div class="Todo-form__message--heading">
        {{session('message')}}
    </div>
    @endif
</div>

<div class="Todo-form__content">
    <div class="Todo-form__title">
        <h2>新規作成</h2>
    </div>
    <form action="/todos" class="Todo-form" method="post">
        @csrf
        <div class="Todo-form__input">
            <input class="Todo-form__input--text" type="text" name="content" placeholder="新しいタスクを入力" value="{{ old('todo') }}" />
            <select class="Todo-form__input--category" name="category_id">
                @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{ $category['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class=" Todo-form__input--button">
            <button class="Todo-form__button-submit" type="submit">作成</button>
        </div>
    </form>

    <div class="Todo-form__title">
        <h2>Todo検索</h2>
    </div>
    <form action="/todos/search" class="Todo-form-search" method="get">
        @csrf
        <div class="Todo-form-search__input">
            <input class="Todo-form-search__input--text" type="text" name="keyword" value="{{ old('keyword') }}">
            <select class="Todo-form-search__input--category" name="category_id">
                <option value="">カテゴリ</option>
                @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{ $category['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class=" Todo-form-search__input--button">
            <button class="Todo-form-search__button-submit" type="submit">検索</button>
        </div>
    </form>

    <div class="Todo-table">
        <table class="Todo-table__list">
            <tr class="Todo-table__row">
                <th class="Todo-table__header">
                    <span class="Todo-table__header-span">Todo</span>
                    <span class="Todo-table__header-span">カテゴリ</span>
                </th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="Todo-table__row">
                <td class="Todo-table__item">
                    <form action=" /todos/update" class="Todo-form-update__button" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="Todo-form-update__item">
                            <input class="Todo-form-update__item--text" type="text" name="content" value="{{$todo['content']}}">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                        </div>
                        <div class="Todo-form-update__item">
                            <p class="Todo-form-update__item--category">{{ $todo['category']['name'] }}</p>
                        </div>
                        <div class=" update__button">
                            <button class="update__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="Todo-table__item">
                    <form action=" /todos/delete" class="Todo-form-delete__button" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="delete__button">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                            <button class="delete__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection