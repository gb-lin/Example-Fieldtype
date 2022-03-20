<?php
namespace GilbertLin\ExampleFt\Model;

use \ExpressionEngine\Service\Model\Model;

class ExampleModel extends Model
{
    protected static $_primary_key = 'example_id';
    protected static $_table_name = 'example_ft_examples';

    protected $example_id;
    protected $entry_id;
    protected $field_id;
    protected $value;

    protected static $_typed_columns = [
        'value' => 'base64Serialized',
    ];

    protected static $_relationships = [
        'ChannelEntry' => [
            'type' => 'BelongsTo',
            'model' => 'ee:ChannelEntry',
            'from_key' => 'entry_id',
            'to_key' => 'entry_id',
            'inverse' => [
                'name' => 'ExampleModel',
                'type' => 'HasOne'
            ],
        ],
        'ChannelField' => [
            'type' => 'BelongsTo',
            'model' => 'ee:ChannelField',
            'from_key' => 'field_id',
            'to_key' => 'field_id',
            'inverse' => [
                'name' => 'ExampleModel',
                'type' => 'HasMany'
            ],
        ],
    ];
}