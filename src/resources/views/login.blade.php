@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
            <a class="header__link" href="/register">
                register
            </a>
@endsection

@section('content')
        <div class="login-form__content">
            <div class="login-form__heading">
                <span>Login</span>
            </div>
            <form class="form">
                <div class="form__group">
                    <p class="form__group--item">メールアドレス</p>
                    <input class="form__group-input" type="email" placeholder="例: test@example.com">
                </div>
                <div class="form__group">
                    <p class="form__group--item">パスワード</p>
                    <input class="form__group-input" type="text" placeholder="例: coachtech1106">
                </div>
                <div class="form__button">
                    <button class="form__button-submit">ログイン</button>
                </div>
            </form>
        </div>
@endsection