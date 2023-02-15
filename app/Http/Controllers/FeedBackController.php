<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        $feedBack = Contact::latest()->get();

        return view('admin/feedback/index', compact('feedBack'));
    }
}
