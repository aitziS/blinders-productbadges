<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

function productbadges_install_sql()
{
    $db = Db::getInstance();

    $sql1 = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'productbadges` (
        `id_productbadges` INT(11) NOT NULL AUTO_INCREMENT,
        `position` VARCHAR(10) NOT NULL,
        `bg_color` VARCHAR(7) NOT NULL,
        `text_color` VARCHAR(7) NOT NULL,
        `active` TINYINT(1) NOT NULL DEFAULT 1,
        `date_add` DATETIME NOT NULL,
        `date_upd` DATETIME NULL,
        PRIMARY KEY (`id_productbadges`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';

    $sql2 = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'productbadges_lang` (
        `id_productbadges` INT(11) NOT NULL,
        `id_lang` INT(11) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id_productbadges`, `id_lang`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';

    $sql3 = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'productbadges_product` (
        `id_productbadges` INT(11) NOT NULL,
        `id_product` INT(11) NOT NULL,
        PRIMARY KEY (`id_productbadges`, `id_product`),
        INDEX (`id_product`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';

    $res1 = $db->execute($sql1);
    $res2 = $db->execute($sql2);
    $res3 = $db->execute($sql3);

    return (bool) ($res1 && $res2 && $res3);
}