<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function index(Request $request) 
    {
        $contacts = Contact::with('category')
            ->CategorySearch($request->category_id)
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->DateSearch($request->date)
            ->paginate(7);

        $categories = Category::all();

        return view('admin', [
            'contacts' => $contacts,
            'categories' => $categories,
            'keyword' => $request->keyword,
            'gender' => $request->gender,
            'category_id' => $request->category_id,
            'date' => $request->date,
        ]);
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }

    public function reset()
    {
        return redirect('/admin');
    }
}
