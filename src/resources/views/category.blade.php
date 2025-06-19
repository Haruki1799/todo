@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')

<div class="category-form__message">
    @if ($errors->any())
    <div class="category-form__message--error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('message'))
    <div class="category-form__message--heading">
        {{session('message')}}
    </div>
    @endif
</div>

<div class="category-form__content">
    <form action="/category" class="category-form" method="post">
        @csrf
        <div class="category-form__input">
            <input class="category-form__input--text" type="text" name="name" value="{{ old('category') }}" />
        </div>

        <div class="category-form__input--button">
            <button class="category-form__button-submit" type="submit">作成</button>
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__list">
            <tr class="category-table__row">
                <th class="category-table__header">Category</th>
            </tr>
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action=" /" class="category-form-update__button" method="post">
                        <div class="category-form-update__item">
                            <input class="category-form-update__item--text" type="text" name="content" value="category1">
                        </div>
                        <div class="update__button">
                            <button class="update__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form action=" /" class="category-form-delete__button" method="post">
                        <div class="delete__button">
                            <button class="delete__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection