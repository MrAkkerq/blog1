<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts/index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect('/admin/feedback');
    }
}
