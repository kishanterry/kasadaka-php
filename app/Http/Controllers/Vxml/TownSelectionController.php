<?php

namespace App\Http\Controllers\Vxml;

use App\VoiceXml;
use App\Http\Controllers\Controller;

class TownSelectionController extends Controller
{
    public function index($option)
    {
        $vxml = new VoiceXml();

        $northPrompts = collect([
            asset('audio/en/2_2.wav'),
            asset('audio/en/2_3.wav'),
        ]);

        $southPrompts = collect([
            asset('audio/en/3_2.wav'),
            asset('audio/en/3_3.wav'),
            asset('audio/en/3_4.wav'),
            asset('audio/en/3_5.wav'),
        ]);

        $response = $vxml->prompt(asset('audio/en/2_1.wav'));


        if ($option == '1') {
            $northPrompts->each(function($p) use ($response) {
                $response->prompt($p);
            });
        } else {
            $southPrompts->each(function($p) use ($response) {
                $response->prompt($p);
            });
        }

        $response = $response->prompt(asset('audio/en/2_4.wav'))
            ->response('town', url("/vxml/towns/${option}"));

        return response($response->asXml(), '200')
            ->header('Content-Type', 'text/xml');
    }

    public function create($option)
    {
        $town = request('option') ?? '1';

        if ($town == '9') {
            return redirect(url('/vxml'));
        }

        return redirect(url('/vxml/time-period/' . $town));
    }
}
