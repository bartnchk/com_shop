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

    if( empty( $session->get('products') ) ) {
        $products = array();
        $product_id = $_POST['id'];
        $product_title = $_POST['title'];
        $product_options = $_POST['options'];
        $product_price = $_POST['price'];
        $product_image = $_POST['image'];
        $products[] = array("id"=>$product_id, "qnt"=>1, "title"=>"$product_title", "price"=>$product_price, "image"=>$product_image, "options"=>"$product_options");
    } else {
        $products = $session->get('products');
        $product_id = $_POST['id'];
        $product_title = $_POST['title'];
        $product_options = $_POST['options'];
        $product_price = $_POST['price'];
        $product_image = $_POST['image'];

        $qnt = 1;
        foreach ($products as $product) {
            if ($product['id'] == $product_id && $product['options'] == $product_options)
                $qnt = $product['qnt'] + 1;
        }

        $products[] = array("id"=>$product_id, "qnt"=>$qnt, "title"=>"$product_title", "price"=>$product_price, "image"=>$product_image, "options"=>"$product_options");
    }

    $session->set('products', $products);

?>