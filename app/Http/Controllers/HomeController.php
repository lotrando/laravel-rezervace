<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index () 
    {
        return view('home');
    }
}
