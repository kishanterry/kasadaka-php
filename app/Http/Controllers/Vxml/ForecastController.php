<?php

namespace App\Http\Controllers\Vxml;

use App\VoiceXml;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class ForecastController extends Controller
{
    protected $towns = [
        '1' => 'bolgatanga',
        '2' => 'tamale',
        '3' => 'sunyani',
        '4' => 'kumasi',
        '5' => 'accra',
        '6' => 'ho',
    ];

    public function index($town, $time)
    {
        $vxml = new VoiceXml();
        $client = new Client();

        $res = $client->request('GET', 'https://api.openweathermap.org/data/2.5/forecast', [
            'query' => [
                'APPID' => env('WEATHER_API'),
                'q' => $this->towns[$town] . ',gh'
            ]
        ]);

        $data = json_decode($res->getBody(), true);
        // This data can be used to forecast weather. The calculation algorithm
        // for generating appropriate response is still being figured out.
        // FUTURE WORK!

        if ($time == '1') {
            $vxml->prompt(asset('audio/en/4_4.wav'));
            $vxml->prompt(asset('audio/en/4_2_1.wav'));
            $vxml->prompt(asset('audio/en/4_2_1_2.wav'));
            $vxml->prompt(asset('audio/en/C_2.wav'));
            $vxml->prompt(asset('audio/en/4_2_1_3.wav'));
            $vxml->prompt(asset('audio/en/4_7.wav'));
            $vxml->prompt(asset('audio/en/4_2_1.wav'));
            $vxml->prompt(asset('audio/en/4_2_1_1.wav'));
            $vxml->prompt(asset('audio/en/c_2.wav'));
            $vxml->prompt(asset('audio/en/4_2_1_2.wav'));
        } elseif($time == '2') {
            $vxml->prompt(asset('audio/en/5_2.wav'));
            $vxml->prompt(asset('audio/en/5_2_4.wav'));
            $vxml->prompt(asset('audio/en/C_2.wav'));
            $vxml->prompt(asset('audio/en/5_2_5.wav'));
        } else {
            $vxml->prompt(asset('audio/en/6_1.wav'));
        }

        $response = $vxml->response('vxml', url('/vxml'));

        return response($response->asXml(), '200')
            ->header('Content-Type', 'text/xml');
    }

    public function create($option)
    {
        $vxml = new VoiceXml();

        return response($vxml->disconnect()->asXml(), '200')
            ->header('Content-Type', 'text/xml');
    }
}
