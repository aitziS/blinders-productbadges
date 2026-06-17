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
        if (!parent::install()) {
            return false;
        }

        include_once __DIR__ . '/sql/install.php';
        if (!function_exists('productbadges_install_sql')) {
            parent::uninstall();
            return false;
        }

        if (!productbadges_install_sql()) {
            parent::uninstall();
            return false;
        }

        // Registrar pestaña de administración
        if (!Tab::getIdFromClassName('AdminProductBadgesController')) {
            $tab = new Tab();
            $tab->class_name = 'AdminProductBadgesController';
            $tab->module = $this->name;
            $tab->id_parent = (int) Tab::getIdFromClassName('AdminCatalog');
            $tab->active = 1;
            foreach (Language::getLanguages(false) as $lang) {
                $tab->name[$lang['id_lang']] = $this->l('Product Badges');
            }

            if (!$tab->add()) {
                // Rollback si la pestaña no pudo crearse
                parent::uninstall();
                return false;
            }
        }

        return true;
    }

    public function uninstall()
    {
        // Eliminar pestaña de administración antes de desinstalar el módulo
        $id_tab = Tab::getIdFromClassName('AdminProductBadgesController');
        if ($id_tab) {
            $tab = new Tab((int) $id_tab);
            $tab->delete();
        }

        if (!parent::uninstall()) {
            return false;
        }

        // Ejecutar eliminación de tablas
        include_once __DIR__ . '/sql/uninstall.php';
        if (function_exists('productbadges_uninstall_sql')) {
            return (bool) productbadges_uninstall_sql();
        }

        return true;
    }
}