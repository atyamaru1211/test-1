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
        if (!$request->has('back')) {
            session()->forget('contact');
        }
        $contact = session('contact');

        $categories = Category::all();
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

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->content;
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
