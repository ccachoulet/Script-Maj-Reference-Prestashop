<?php

require('/../../config/config.inc.php');

$prefix_ref = 'REFB-';
$prefix_refd = 'REFD-';
$count = 0;

$products = Db::getInstance()->executeS('SELECT `id_product` FROM '._DB_PREFIX_.'product');
foreach($products as $p){
    Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'product 
        SET `reference`="'.pSQL($prefix_ref.$p['id_product']).'" 
        WHERE `id_product`="'.pSQL($p['id_product']).'"');
    $count++;
}
$products_attributes = Db::getInstance()->executeS('SELECT `id_product_attribute` FROM '._DB_PREFIX_.'product_attribute');
foreach($products_attributes as $pa){
    Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'product_attribute 
        SET `reference`="'.pSQL($prefix_refd.$pa['id_product_attribute']).'" 
        WHERE `id_product_attribute`="'.pSQL($pa['id_product_attribute']).'"');
    $count++;  
}

echo 'Félicitation <strong>'.$count.'</strong> références mises à jour ou ont été créer !';

?>

