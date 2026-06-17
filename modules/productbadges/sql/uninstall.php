<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Elimina las tablas del módulo productbadges.
 * Devuelve true si todas las queries se ejecutaron correctamente, false en caso contrario.
 */
function productbadges_uninstall_sql()
{
    $db = Db::getInstance();

    $tables = [
        _DB_PREFIX_ . 'productbadges',
        _DB_PREFIX_ . 'productbadges_lang',
        _DB_PREFIX_ . 'productbadges_product',
    ];

    $allOk = true;
    foreach ($tables as $table) {
        $sql = 'DROP TABLE IF EXISTS `' . $table . '`';
        $res = $db->execute($sql);
        if (!$res) {
            $allOk = false;
        }
    }

    return (bool) $allOk;
}