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
    <form action="/categories" class="category-form" method="post">
        @csrf
        <div class="category-form__input">
            <input class="category-form__input--text" type="text" name="name" value="{{ old('name') }}" />
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
            @foreach ($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action=" /categories/update" class="category-form-update" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="category-form-update__item">
                            <input class="category-form-update__item--text" type="text" name="name" value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{$category['id']}}">
                        </div>
                        <div class="category-form-update__button">
                            <button class="category-form-update__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form action=" /categories/delete" class="category-form-delete" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="category-form-delete__button">
                            <input type="hidden" name="id" value="{{$category['id']}}">
                            <button class="category-form-delete__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection