<?php

namespace App\Application\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {
        return view('Home.index');
    }
}
