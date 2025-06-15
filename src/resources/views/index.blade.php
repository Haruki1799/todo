@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="Todo-form__message">
    <div class="Todo-form__message--heading">
        Todo作成しました
    </div>
</div>

<div class="Todo-form__content">
    <form action="/" class="Todo-form" method="post">
        @csrf
        <div class="Todo-form__input">
            <input class="Todo-form__input--text" type="text" name="content" placeholder="新しいタスクを入力" value="{{ old('todo') }}" />
        </div>
        <!-- <div class="Todo-form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div> -->
        <div class="Todo-form__input--button">
            <button class="Todo-form__button-submit" type="submit">作成</button>
        </div>
    </form>


    <div class="Todo-table">
        <table class="Todo-table__list">
            <tr class="Todo-table__row">
                <th class="Todo-table__header">Todo</th>
            </tr>
            <tr class="Todo-table__row">
                <td class="Todo-table__item">
                    <form action=" /" class="Todo-form-update__button" method="post">
                        <div class="Todo-form-update__item">
                            <input class="Todo-form-update__item--text" type="text" name="content" value="test">
                        </div>
                        <div class="update__button">
                            <button class="update__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="Todo-table__item">
                    <form action=" /" class="Todo-form-delete__button" method="post">
                        <div class="delete__button">
                            <button class="delete__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            <tr class="Todo-table__row">
                <td class="Todo-table__item">
                    <form action=" /" class="Todo-form-update__button" method="post">
                        <div class="Todo-form-update__item">
                            <input class="Todo-form-update__item--text" type="text" name="content" value="test2">
                        </div>
                        <div class="update__button">
                            <button class="update__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="Todo-table__item">
                    <form action=" /" class="Todo-form-delete__button" method="post">
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