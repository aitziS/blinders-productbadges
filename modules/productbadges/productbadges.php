<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class ProductBadges extends Module
{
    public function __construct()
    {
        $this->name = 'productbadges';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Aitziber';
        $this->need_instance = 0;
        $this->bootstrap = true;

        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '1.7.8.99',
        ];

        parent::__construct();

        $this->displayName = $this->l('Product Badges');
        $this->description = $this->l('Adds visual badges for products in the catalog.');
    }

    public function install()
    {
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
}