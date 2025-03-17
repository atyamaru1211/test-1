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
            <form class="form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form__group">
                    <p class="form__group--item">お名前</p>
                    <input class="form__group-input" type="text" name="name" placeholder="例: 山田  太郎" value="{{ old('name') }}"/>
                    <div class="error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
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
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>
@endsection