<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('gemlock.about');
    }
}

