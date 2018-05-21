<?php

namespace App\Http\Controllers\ICT4D;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        session(['language' => 'en']);

        return view('welcome.index', [
            'language' => session('language')
        ]);
    }
}
