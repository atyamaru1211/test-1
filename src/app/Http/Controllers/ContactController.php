<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
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

        //カテゴリデータを取得
        $categories = Category::all();
        //セッションにデータがあれば、ビューに渡す
        if ($contact) {
            return view('index', compact('contact', 'categories'));
        }

        return view('index', compact('categories'));
    }
    
    public function confirm(ContactRequest $request)
    {
        $tel = $request->input('tel-1') . $request->input('tel-2') . $request->input('tel-3');
        $contact = $request->only(['last_name', 'first_name','gender','email','address','building','category_id','detail']); 
        $contact['tel'] = $tel;

        // category_id に対応するカテゴリ名を取得し、category_name として $contact 配列に追加
        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->content;
        //category_idにカテゴリIDをセット
        $contact['category_id'] = $category->id;
        
        $contact['tel-1'] = $request->input('tel-1');
        $contact['tel-2'] = $request->input('tel-2');
        $contact['tel-3'] = $request->input('tel-3');
        session(['contact' => $contact]);

        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name','gender','email','tel','address','building','category_id', 'detail']);
        Contact::create($contact);
        //
        session()->forget('contact');
        return view('thanks');
    }

    public function destroy(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete();
        return redirect('/admin');
    }
}
