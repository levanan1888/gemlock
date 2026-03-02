<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('gemlock.contact');
    }
}

