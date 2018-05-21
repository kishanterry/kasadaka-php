<?php

namespace App\Http\Controllers\ICT4D;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimePeriodSelectionController extends Controller
{
    public function index($option)
    {
        session(['town' => $option]);

        return view('time-period.index', [
            'language' => session('language')
        ]);
    }
}
