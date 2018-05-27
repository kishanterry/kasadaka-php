<?php

namespace App;

class VoiceXML {

    protected $builder;

    protected $prompts;
    protected $response;

    function __construct()
    {
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

        $filled = $field->addChild('filled');
        $if = $filled->addChild('if');
        $if->addAttribute('cond', "option == '1'");
        $c = $if->addChild('assign');
        $c->addAttribute('name', 'option');
        $c->addAttribute('expr', "'1'");

        $if->addChild('elseif')->addAttribute('cond', "option == '2'");

        $c = $if->addChild('assign');
        $c->addAttribute('name', 'option');
        $c->addAttribute('expr', "'2'");

        $if->addChild('elseif')->addAttribute('cond', "option == '3'");

        $c = $if->addChild('assign');
        $c->addAttribute('name', 'option');
        $c->addAttribute('expr', "'3'");

        $if->addChild('elseif')->addAttribute('cond', "option == '4'");

        $c = $if->addChild('assign');
        $c->addAttribute('name', 'option');
        $c->addAttribute('expr', "'4'");

        $if->addChild('else');
        $filled->addChild('goto')->addAttribute('next', "submit_form");

        $sForm = $vxml->addChild('form');
        $sForm->addAttribute('id', 'submit_form');

        $block = $sForm->addChild('block');
        $submit = $block->addChild('submit');
        $submit->addAttribute('next', $endpoint);
        $submit->addAttribute('method', 'POST');
        $submit->addAttribute('namelist', 'option');

        return $vxml;
    }

    public function disconnect()
    {
        $vxml = new \SimpleXMLElement('<vxml/>');
        $vxml->addAttribute('xmlns', 'http://www.w3.org/2001/vxml');
        $vxml->addAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $vxml->addAttribute('version', '2.1');
        $vxml->addAttribute('xsi:schemaLocation', 'http://www.w3.org/2001/vxml http://www.w3.org/TR/2007/REC-voicexml21-20070619/vxml.xsd');

        $property = $vxml->addChild('disconnect');

        return $vxml;
    }
}
