@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
        <div class="confirm__content">
            <div class="confirm__heading">
                <span>Confirm</span>
            </div>
            <form class="form" action="/contacts" method="post">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly/>
                                <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly/>
                                <?php
                                if ($contact['gender'] == '1') {
                                    echo '<span class="gender__text">男性</span>';
                                } elseif ($contact['gender'] == '2') {
                                    echo '<span class="gender__text">女性</span>';
                                } else {
                                    echo '<span class="gender__text">その他</span>';
                                } ?>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header"></th>
                            <td class="confirm-table__text">
                                <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header"></th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header"></th>
                            <td class="confirm-table__text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header"></th>
                            <td class="confirm-table__text">
                                <input type="text" value="{{ $contact['category_name'] }}" readonly/>
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header"></th>
                            <td class="confirm-table__text">
                                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <div class="form__button-back">
                        <a class="form__back" href="/?back=true">修正</a>
                    </div>
                </div>
            </form>
        </div>
@endsection