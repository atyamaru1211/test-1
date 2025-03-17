@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('content')
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <span>Contact</span>
            </div>
            <form class="form" action="/confirm" method="post">
                @csrf
                <div class="form__group">
                    <!-- お名前 -->
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <div class="name__input">
                                <input type="text" name="last-name" placeholder="例: 山田" value="{{ $contact['last-name'] ?? old('last-name') }}">
                                <div class="form__error">
                                @error('last-name')
                                {{ $message }}
                                @enderror
                                </div>
                            </div>
                            <div class="name__input">
                                <input type="text" name="first-name" placeholder="例: 太郎" value="{{ $contact['first-name'] ?? old('first-name') }}">
                                <div class="form__error">
                                @error('first-name')
                                {{ $message }}
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 性別 -->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-radio">
                            <label class="gender__radio">
                                <input type="radio" name="gender" value="1" {{ ($contact['gender'] ?? old('gender')) =='1' ? 'checked' :  (empty($contact['gender'] ?? old('gender')) ? 'checked' : '') }}/>
                                <span class="gender__radio-mark"></span> 男性
                            </label>
                            <label class="gender__radio">
                                <input type="radio" name="gender" value="2" {{ $contact['gender'] ?? old('gender') =='2' ? 'checked' : '' }}/>
                                <span class="gender__radio-mark"></span> 女性
                            </label>
                            <label class="gender__radio">
                                <input type="radio" name="gender" value="3" {{ $contact['gender'] ?? old('gender') =='3' ? 'checked' : '' }}/>
                                <span class="gender__radio-mark"></span> その他
                            </label>
                        </div>
                        <div class="form__error">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--メールアドレス-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="email" placeholder="test@example.com" value="{{ $contact['email'] ?? old('email') }}"/>
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--電話番号-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <div class="tel__input">
                                <input type="text" name="tel-1" placeholder="080" value="{{ $contact['tel-1'] ?? old('tel-1') }}"/>
                                <div class="form__error">
                                    @error('tel-1')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <span class="hyphen">-</span>
                            <div class="tel__input">
                                <input type="text" name="tel-2" placeholder="1234" value="{{ $contact['tel-2'] ?? old('tel-2') }}"/>
                                <div class="form__error">
                                    @error('tel-2')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <span class="hyphen">-</span>
                            <div class="tel__input">
                                <input type="text" name="tel-3" placeholder="5678" value="{{ $contact['tel-3'] ?? old('tel-3') }}"/>
                                <div class="form__error">
                                    @error('tel-3')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--住所-->
                <div class="form__group">
                    <div class="form__group--title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ $contact['address'] ?? old('address') }}"/>
                        </div>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!--建物名-->
                <div class="form__group">
                    <div class="form__group--title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ $contact['building'] ?? old('building') }}"/>
                        </div>
                    </div>
                </div>

                <!--問い合わせの種類-->
                <div class="form__group--category">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__select--category">
                        <select name="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" {{ ($contact['category_id'] ?? old('category_id')) == $category->id ? 'selected' : '' }}>{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--お問い合わせ内容-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ $contact['detail'] ?? old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <!--送信ボタン-->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
@endsection



