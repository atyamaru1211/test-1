<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        //リクエストにbackパラメータが存在しない場合のみセッションを削除
        if (!$request->has('back')) {
            session()->forget('contact');
        }
        //セッションから入力データを取得
        $contact = session('contact');
        //セッションにデータがあれば、ビューに渡す
        if ($contact) {
            return view('index', compact('contact'));
        }
        return view('index');
    }
    
    public function confirm(ContactRequest $request)
    {
        $tel = $request->input('tel-1') . $request->input('tel-2') . $request->input('tel-3');
        $contact = $request->only(['last-name', 'first-name','gender','email','address','building','category','detail']); //categoryあっていいの？
        $contact['tel'] = $tel;
        
        $contact['tel-1'] = $request->input('tel-1');
        $contact['tel-2'] = $request->input('tel-2');
        $contact['tel-3'] = $request->input('tel-3');
        session(['contact' => $contact]);

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last-name', 'first-name','gender','email','tel','address','building','category','detail']);//ここもcategoryあっていいの？
        Contact::create($contact);
        //
        session()->forget('contact');
        return view('thanks');
    }
}
