@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
<a class="header__link" href="/login">
    login
</a>
@endsection

@section('content')
        <div class="register-form__content">
            <div class="register-form__heading">
                <span>Register</span>
            </div>
            <form class="form">
                <div class="form__group">
                    <p class="form__group--item">お名前</p>
                    <input class="form__group-input" type="text" placeholder="例: 山田  太郎">
                </div>
                <div class="form__group">
                    <p class="form__group--item">メールアドレス</p>
                    <input class="form__group-input" type="email" placeholder="例: test@example.com">
                </div>
                <div class="form__group">
                    <p class="form__group--item">パスワード</p>
                    <input class="form__group-input" type="text" placeholder="例: coachtech1106">
                </div>
                <div class="form__button">
                    <button class="form__button-submit">登録</button>
                </div>
            </form>
        </div>
@endsection