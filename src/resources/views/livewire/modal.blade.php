<div>
    <button class="detail-button" type="button" wire:click="openModal()">詳細</button>

    @if($showModal)
    <div class="modal">
        <div class="modal-window">
            <div class="window__close-button" wire:click="closeModal()">
                <span>×</span>
            </div>
            <table class="modal__table">
                <tr class="modal__row">
                    <th class="modal__header">お名前</th>
                    <td class="modal__item">
                        {{ $contact['last_name']}}
                        <span class="space"></span>
                        <span class="first_name">{{ $contact['first_name'] }}</span>
                    </td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">性別</th>
                    <td class="modal__item">
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
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">メールアドレス</th>
                    <td class="modal__item">{{ $contact['email'] }}</td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">電話番号</th>
                    <td class="modal__item">{{ $contact['tel'] }}</td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">住所</th>
                    <td class="modal__item">{{ $contact['address'] }}</td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">建物名</th>
                    <td class="modal__item">{{ $contact['building'] }}</td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">お問い合わせの種類</th>
                    <td class="modal__item">{{ $contact['category']['content'] }}</td>
                </tr>
                <tr class="modal__row">
                    <th class="modal__header">お問い合わせ内容</th>
                    <td class="modal__item">{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <form class="delete__form" action="/delete" method="post">
                @method('delete')
                @csrf
                <button class="delete-button">削除</button>
                <input type="hidden" name="id" value="{{ $contact['id'] }}"/>
            </form>
        </div>
    </div>
    @endif
</div>