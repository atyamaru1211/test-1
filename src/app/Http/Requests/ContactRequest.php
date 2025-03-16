<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ /*文字列型、255文字以下という指定はなく、それに基づくエラーメッセージの指定もなかったため書きませんでした。 */
            'last-name' => ['required'],
            'first-name' => ['required'],
            'gender' => ['required'],
            'email' => ['required','email'],
            'tel-1' => ['required', 'digits_between:1,5'],
            'tel-2' => ['required', 'digits_between:1,5'],
            'tel-3' => ['required', 'digits_between:1,5'],
            'address' => ['required'],
            'category_id' => ['required'],
            'detail' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last-name.required' => '姓を入力してください',
            'first-name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel-1.required' => '電話番号を入力してください',//?
            'tel-1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-2.required' => '電話番号を入力してください',//?
            'tel-2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-3.required' => '電話番号を入力してください',//?
            'tel-3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
