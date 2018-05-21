<?php

namespace App\Http\Controllers\ICT4D;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForecastController extends Controller
{
    protected $time = '1';

    protected $towns = [
        '1' => 'bolgatanga',
        '2' => 'tamale',
        '3' => 'sunyani',
        '4' => 'kumasi',
        '5' => 'accra',
        '6' => 'ho',
    ];

    protected $town = '1';

    public function index($time)
    {
        $this->time = $time;

        if(session('town') && array_key_exists(session('town'), $this->towns)) {
            $this->town = $this->towns[session('town')];
        }

        $forecasts = [];

        switch ($time) {
            case '1':
                $forecasts = ['4_4.wav', '4_2_1.wav', '4_2_1_2.wav', 'C_2.wav', '4_2_1_3.wav', '4_7.wav', '4_2_1.wav', '4_2_1_1.wav', 'C_2.wav', '4_2_1_2.wav'];
                break;

            case '2':
                $forecasts = ['5_2.wav', '5_2_4.wav', 'C_2.wav', '5_2_5.wav'];
                break;

            case '3':
                $forecasts = ['6_1.wav'];
                break;
        }

        return view('forecast.index', [
            'forecasts' => $forecasts,
            'language' => session('language')
        ]);
    }
}
