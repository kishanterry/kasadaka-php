<?php

namespace App\Http\Controllers;

use App\VoiceXml;

class VxmlController extends Controller
{
    public function index()
    {
        $vxml = new VoiceXml();

        return response($vxml->response(), '200')
            ->header('Content-Type', 'text/xml');
    }
}
