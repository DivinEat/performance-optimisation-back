<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DefaultController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function all()
    {
        return view('index');
    }

    public function slow()
    {
        return view('index');
    }
}
