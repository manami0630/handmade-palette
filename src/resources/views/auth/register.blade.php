@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
    <form class="form" action="/register" method="post">
    @csrf
        <div class="form__heading">
            <h2>新規会員登録</h2>
        </div>
        <div class="form__group">
            <label class="register-form__label" for="name">ユーザー名</label>
            <input class="register-form__input" type="text" name="name" id="name" value="{{ old('name') }}">
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <label class="register-form__label" for="email">メールアドレス</label>
            <input class="register-form__input" type="email" name="email" id="email" value="{{ old('email') }}">
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <label class="register-form__label" for="password">パスワード</label>
            <input class="register-form__input" type="password" name="password" id="password">
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <label class="register-form__label" for="password_confirmation">確認用パスワード</label>
            <input class="register-form__input" type="password" name="password_confirmation" id="password_confirmation">
            <div class="form__error">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <input class="register-form__btn" type="submit" value="登録する">
        </div>
        <div class="form__group">
            <a class="login__btn" href="/login">ログインはこちら</a>
        </div>
    </form>
@endsection