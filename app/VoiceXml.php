<?php

namespace App;

use pdeans\Builders\XmlBuilder;

class VoiceXML {

    protected $builder;

    protected $prompts;
    protected $response;

    function __construct()
    {
        $this->builder = new XmlBuilder;
        $this->prompts = collect([]);
    }

    public function prompt($src)
    {
        $this->prompts->push($src);

        return $this;
    }

    public function response($formId, $endpoint)
    {
        $vxml = new \SimpleXMLElement('<vxml/>');
        $vxml->addAttribute('xmlns', 'http://www.w3.org/2001/vxml');
        $vxml->addAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $vxml->addAttribute('version', '2.1');
        $vxml->addAttribute('xsi:schemaLocation', 'http://www.w3.org/2001/vxml http://www.w3.org/TR/2007/REC-voicexml21-20070619/vxml.xsd');

        $property = $vxml->addChild('property');
        $property->addAttribute('name', 'inputmodes');
        $property->addAttribute('value', 'dtmf');

        $form = $vxml->addChild('form');
        $form->addAttribute('id', $formId);

        $field = $form->addChild('field');
        $field->addAttribute('name', 'option');

        $prompts = $field->addChild('prompt');
        $this->prompts->each(function($src) use ($prompts) {
            $prompts->addChild('audio')->addAttribute('src', $src);
        });

        $sForm = $vxml->addChild('form');
        $sForm->addAttribute('id', 'submit_form');

        $block = $sForm->addChild('block');
        $submit = $block->addChild('submit');
        $submit->addAttribute('next', $endpoint);
        $submit->addAttribute('method', 'POST');

        return $vxml;

       //          'form' => [
       //              '@a' => [
       //                  'id' => 'welcome',
       //              ],
       //              '@t' => ['OK' => 'OK']
       //          ],
       //      ]
       //  ]);

       //  return $this->response;
    }
}
