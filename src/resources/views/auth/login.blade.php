@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
            <a class="header-nav__button" href="/register">
                register
            </a>
@endsection

@section('content')
        <div class="login-form__content">
            <div class="login-form__heading">
                <span>Login</span>
            </div>
            <form class="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form__group">
                    <p class="form__group--item">メールアドレス</p>
                    <input class="form__group-input" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
                    <div class="error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <p class="form__group--item">パスワード</p>
                    <input class="form__group-input" type="password" name="password" placeholder="例: coachtech1106"/>
                    <div class="error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>
@endsection