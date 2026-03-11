<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Services\HomeService;

class HomeController extends Controller
{
    public function __construct(private readonly HomeService $homeService) {}

    public function index()
    {
        return view('gemlock.home', $this->homeService->getHomeData());
    }
}

