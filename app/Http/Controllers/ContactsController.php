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
//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect('/admin/feedback');
    }



//    public function show($id)
//    {
//        //
//    }

//    public function edit($id)
//    {
//        //
//    }
//    public function update(Request $request, $id)
//    {
//        //
//    }

//    public function destroy($id)
//    {
//        //
//    }
}
