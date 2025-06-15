@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="Todo-form__content">
    <div class="Todo-form__heading">
        <h2>Todo作成しました</h2>
    </div>

    <form action="/" class="Todo-form" method="post">
        @csrf
        <div class="Todo-form__input">
            <input class="Todo-form__input--text" type="text" name="todo" placeholder="新しいタスクを入力" value="{{ old('todo') }}" />
        </div>
        <div class="Todo-form__error">
            <!--バリデーション機能を実装したら記述します。-->
            <!-- @error('name')
                {{ $message }}
                @enderror -->
        </div>

        <div class="Todo-form__input--button">
            <button class="Todo-form__button-create" type="submit">作成</button>
        </div>
    </form>
</div>


<table>
    <tr>
        <th>Todo</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>test</td>
        <td>
            <form action="/" class="form__button" method="post">
                <button class="form__button-update" type="submit">更新</button>
                <button class="form__button-delete" type="submit">削除</button>
            </form>
        </td>
    </tr>
</table>

@endsection