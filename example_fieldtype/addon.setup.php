<?php

return [
    'author'            => 'Gilbert Lin',
    'author_url'        => '',
    'name'              => 'Example Fieldtype',
    'description'       => 'This is an example',
    'version'           => '1.0.0',
    'namespace'         => 'GilbertLin\ExampleFt',
    'settings_exist'    => false,
    'models'        => [
        'ExampleModel' => 'Model\ExampleModel',
    ],
    'fieldtypes'        => [
        'example_fieldtype' => [
            'name' => 'Example Fieldtype',
            'compatibility' => '',
        ],
    ],
    'models.dependencies' => [
        'ExampleModel' => [
            'ee:ChannelEntry',
            'ee:ChannelField',
        ]
    ],
];
