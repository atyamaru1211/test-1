<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function export(Request $request)//: StreamedResponse
    {
        $contacts = Contact::with('category')
            ->CategorySearch($request->category_id)
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->DateSearch($request->date)
            ->get();

        $head = ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容'];

        $f = fopen('contacts.csv', 'w');
        if ($f) {
            fprintf($f, "\xEF\xBB\xBF");

            fputcsv($f, $head);

            foreach ($contacts as $contact) {
                $row = [
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail,
                ];
                fputcsv($f, $row);
            }
            fclose($f);

            header("COntent-Type: application/octet-stream");
            header('Content-Length: ' . filesize('contacts.csv'));
            header('Content-Disposition: attachment; filename=contacts.csv');
            readfile('contacts.csv');

            unlink('contacts.csv');
        }

        return redirect('/admin');

    }

}
