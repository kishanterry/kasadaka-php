<?php

namespace App\Http\Controllers\ICT4D;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TownSelectionController extends Controller
{
    public function show($option)
    {
        $language = 'en';
        $view = 'north';

        switch ($option) {
            case '1':
                $view = 'north';
                break;

            case '2':
                $view = 'south';
                break;
        }

        session(['region' => $option]);

        return view("towns.${view}", [
            'language' => session('language')
        ]);
    }
}
