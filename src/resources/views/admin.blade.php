@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection


@section('header')
            <form class="form" action="logout" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
            </form>
@endsection

@section('content')
        <div class="admin-form__content">
            <div class="admin-form__heading">
                <span>Admin</span>
            </div>

            <form class="form">
                <div class="form__search">
                    <div class="form__search-content">
                        <div class="form__input--text">
                            <input type="text" name="search-name-email" placeholder="名前やメールアドレスを入力してください">
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__select--gender">
                            <select name="gender">
                                <option>性別</option>
                                <option value="全て">全て</option>
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__select--category">
                            <select name="category">
                                <option value="">お問い合わせの種類</option>
                                <option value="商品のお届けについて">商品のお届けについて</option>
                                <option value="商品の交換について">商品の交換について</option>
                                <option value="商品トラブル">商品トラブル</option>
                                <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__search-content">
                        <div class="form__input--date">
                            <input type="date" name="date">
                        </div>
                    </div>
                    <div class="search__button">
                        <button class="search__button-submit" type="submit">検索</button>
                    </div>
                    <div class="search__reset">
                        <a class="search__reset-button" href="/">リセット</a>
                    </div>
                </div>
            </form>
                <!--エクスポートと、ページネーション-->
            <div>
                <div class="export">
                    <div class="export-button">
                        <button class="export-button-submit" type="submit">
                            エクスポート
                        </button>
                    </div>
                </div>
                <div class="paginate">
                    <!---->
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
                    <!--ここにforeach(-as-)が入ると予想-->
                    <tr class="admin-table__row">
                        <!--<form class="content-form">-->
                            <td class="content-table__name">
                                山田
                                <span class="space"></span>
                                <span class="first-name">太郎</span>
                            </td>
                            <td class="content-table__gender">
                                <input type="hidden" value="性別"/>
                                男性
                                <?php
                                /*
                                if (contact['gender'] == '1'){
                                    echo '男性';
                                } elseif (contact['gender'] == '2') {
                                    echo '女性';
                                } else {
                                    echo 'その他';
                                } */?>
                            </td>
                            <td class="content-table__email">
                                sample@email.com
                                <!---->
                            </td>
                            <td class="content-table__category">
                                商品の交換について
                                <!---->
                            </td>
                            <td class="content-table__detail">
                                <button class="detail-button" type="button" wire:click="openModal()">詳細</button>
                            </td>
                    </tr>
                </table>
            </div>
        </div>
@endsection