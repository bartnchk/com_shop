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

    echo '<pre>';
    print_r($products);
    echo '</pre>';

?>