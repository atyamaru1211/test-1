@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection


@section('header')
            @if (Auth::check())
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button" type="submit">logout</button>
            </form>
            @endif
@endsection

@section('content')
        <div class="admin-form__content">
            <div class="admin-form__heading">
                <span>Admin</span>
            </div>

            <form class="form" action="/search" method="get">
                @csrf
                <div class="form__search">
                    <div class="form__search-content">
                        <div class="form__input--text">
                            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ $keyword ?? '' }}">
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__select--gender">
                            <select name="gender">
                                <option value="">性別</option>
                                <option value="全て" {{request()->gender ==='全て'? "selected" : "";}}>全て</option>
                                <!--<option value="全て" @if(old('gender') === '全て') selected @endif>全て</option>-->
                                @foreach (['1' => '男性', '2' => '女性', '3' => 'その他'] as $value => $label)
                                    <option value="{{ $value }}" @if(old('gender', $gender ?? '') === (string)$value) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__select--category">
                            <select name="category_id">
                                <option value="">お問い合わせの種類</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" {{ (string)($category_id ?? '') === (string)$category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__input--date">
                            <input type="date" name="date" value="{{ $date ?? '' }}">
                        </div>
                    </div>
                    <div class="search__button">
                        <button class="search__button-submit" type="submit">検索</button>
                    </div>
                    <div class="search__reset">
                        <a class="search__reset-button" href="/reset">リセット</a>
                    </div>
                </div>
            </form>
                <!--エクスポートと、ページネーション-->
            <div>
                <div class="buttons">
                    <div class="export-button">
                        <button class="export-button-submit" type="submit">
                            エクスポート
                        </button>
                    </div>
                    <div class="paginate-button">
                        {{ $contacts->links() }}
                    </div>

                </div>
            </div>

                <!--一覧表-->
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">
                            <span class="admin-table__header-span">お名前</span>
                            <span class="admin-table__header-span">性別</span>
                            <span class="admin-table__header-span">メールアドレス</span>
                            <span class="admin-table__header-span">お問い合わせの種類</span>
                            <span class="admin-table__header-span">詳細</span>
                        </th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr class="admin-table__row">
                        <!--<form class="content-form">-->
                            <td class="content-table__name">
                                {{ $contact['last-name'] }}
                                <span class="space"></span>
                                <span class="first-name">{{ $contact['first-name'] }}</span>
                            </td>
                            <td class="content-table__gender">
                                <input type="hidden" value="{{ $contact['gender'] }}"/>
                                <?php
                                if ($contact['gender'] == '1'){
                                    echo '男性';
                                } elseif ($contact['gender'] == '2') {
                                    echo '女性';
                                } else {
                                    echo 'その他';
                                } ?>
                            </td>
                            <td class="content-table__email">
                                {{ $contact['email'] }}
                            </td>
                            <td class="content-table__category">
                                {{ $contact['category']['content']}}
                            </td>
                            <td class="content-table__detail">
                                <button class="detail-button" type="button" wire:click="openModal()">詳細</button>
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection