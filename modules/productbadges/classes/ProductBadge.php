<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class ProductBadge extends ObjectModel
{
    public $id_productbadges;
    public $position;
    public $bg_color;
    public $text_color;
    public $active;
    public $name;
    public $date_add;
    public $date_upd;

    public static $definition = [
        'table' => 'productbadges',
        'primary' => 'id_productbadges',
        'multilang' => true,
        'fields' => [
            'position' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'bg_color' => ['type' => self::TYPE_STRING, 'validate' => 'isColor', 'required' => true],
            'text_color' => ['type' => self::TYPE_STRING, 'validate' => 'isColor', 'required' => true],
            'active' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
            'name' => ['type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 255],
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
            'date_upd' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
        ],
    ];
}