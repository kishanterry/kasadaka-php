<?php

namespace App\Http\Controllers\Vxml;

use App\VoiceXml;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $vxml = new VoiceXml();

        $response = $vxml->prompt(asset('audio/en/1.wav'))
            ->prompt(asset('audio/en/2.wav'))
            ->prompt(asset('audio/en/3.wav'))
            ->response('welcome', url('/vxml'));

        return response($response->asXml(), '200')
            ->header('Content-Type', 'text/xml');
    }

    public function create()
    {
        $region = request('option') ?? '1';

        if ($region == '9') {
            return redirect(url('/vxml'));
        }

        return redirect(url('/vxml/towns/' . $region));
    }
}
