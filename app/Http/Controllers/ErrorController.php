<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function noscript()
    {
        return view('layouts.noscript');
    }
}
