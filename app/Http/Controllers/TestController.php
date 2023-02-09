<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('test', ['only' => ['index']]);
        //$this->middleware('test', ['except' => ['index']]);
    }
    public function index()
    {
        return 'hello';
    }
}
