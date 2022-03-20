<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Example_fieldtype_ft extends EE_Fieldtype
{
    private $_table = 'example_ft_examples';

    public $info = array(
        'name'      => 'example_fieldtype',
        'version'   => '1.0.0',
    );

    public function install()
    {
        return [];
    }

    public function display_global_settings()
    {
        $val = array_merge($this->settings, $_POST);

        $form = '';

        return $form;
    }

    public function save_global_settings()
    {
        return array_merge($this->settings, $_POST);
    }

    public function display_settings($data)
    {
    }

    public function save_settings($data)
    {
        return [];
    }

    public function display_field($data)
    {
        $entry_id = $this->content_id();
        $field_id = $this->field_id;

        $example = ee('Model')->get('example_fieldtype:ExampleModel')->filter('entry_id', $entry_id)->filter('field_id', $field_id)->first();
        if ( ! empty($example)) {
            $data = $example->value;
        }

        return form_input(array(
            'name'  => $this->field_name,
            'id'    => $this->field_id,
            'value' => $data
        ));
    }

    public function save($data, $model = null)
    {
        $entry_id = $this->content_id();
        $field_id = $this->field_id;

        if ( ! empty($data)) {
            $example = ee('Model')->get('example_fieldtype:ExampleModel')->filter('entry_id', $entry_id)->filter('field_id', $field_id)->first();
            if (empty($example)) {
                $example = ee('Model')->make('example_fieldtype:ExampleModel');
            }
            $example->entry_id = $entry_id;
            $example->field_id = $field_id;
            $example->value = $data;
            $example->save();
        }

        return $entry_id;
    }

    public function replace_tag($data, $params = array(), $tagdata = false)
    {
        return 'Magic!';
    }
}
