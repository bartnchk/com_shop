<?php

    define( '_JEXEC', 1 );
    define( 'DS', DIRECTORY_SEPARATOR );

    $curDir = dirname(__FILE__);

    $curDir = substr($curDir, 0, strrpos($curDir, DS));
    $curDir = substr($curDir, 0, strrpos($curDir, DS));
    $curDir = substr($curDir, 0, strrpos($curDir, DS));

    define('JPATH_BASE', $curDir);

    require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' );
    require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' );

    $mainframe = JFactory::getApplication('site');
    $mainframe->initialise();

    $session = JFactory::getSession();
    $products = $session->get('products');

    $product_id = $_POST['attr'];
    $product_option = $_POST['option'];

    $key = '';
    foreach ($products as $key=>$product) {
        if ($product['id'] == $product_id && $product['options'] == $product_option)
            $key_to_delete = $key;
    }

    unset($products[$key_to_delete]);

    $session->set('products', $products);

    echo 'done';

?>