<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Example_fieldtype_mcp
{
    public function index()
    {
        $html = '<p>Time to make magic</p>';

        return [
            'body'  => $html,
            'breadcrumb' => [
                ee('CP/URL')->make('addons/settings/example_fieldtype')->compile() => lang('example_fieldtype')
            ],
            'heading' => lang('example_fieldtype_settings'),
        ];
    }
}
