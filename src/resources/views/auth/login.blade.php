@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
    <form class="form" action="/login" method="post">
    @csrf
        <div class="form__heading">
            <h2>ログイン</h2>
        </div>
        <div class="form__group">
            <label class="login-form__label" for="email">メールアドレス</label>
            <input class="login-form__input" type="email" name="email" id="email" value="{{ old('email') }}">
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <label class="login-form__label" for="password">パスワード</label>
            <input class="login-form__input" type="password" name="password" id="password">
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <input class="login-form__btn" type="submit" value="登録する">
        </div>
        <div class="form__group">
            <a class="register__btn" href="/register">新規会員登録はこちら</a>
        </div>
    </form>
@endsection