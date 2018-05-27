<?php

namespace App\Http\Controllers\Vxml;

use App\VoiceXml;
use App\Http\Controllers\Controller;

class TimePeriodSelectionController extends Controller
{
    public function index($town)
    {
        $vxml = new VoiceXml();

        $response = $vxml->prompt(asset('audio/en/4.wav'))
            ->prompt(asset('audio/en/5.wav'))
            ->prompt(asset('audio/en/6.wav'))
            ->prompt(asset('audio/en/2.4.wav'))
            ->response('time-period', url('/vxml/time-period/' . $town . '/'));

        return response($response->asXml(), '200')
            ->header('Content-Type', 'text/xml');
    }

    public function create($option)
    {
        $town = $option;
        $timePeriod = request('option') ?? '1';

        if ($timePeriod == '9') {
            return redirect(url('/vxml'));
        }

        return redirect(url('/vxml/forecast/' . $town . '/' . $timePeriod));
    }
}
