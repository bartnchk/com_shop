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

    $db = JFactory::getDBO();

    $input = JFactory::getApplication()->input;
    $ref = $input->get('ref');

    $db->setQuery("select * from #__z_shop_nova_poshta_departments where `ref` = '$ref'");

    $result = $db->loadObjectList();

    $return = "<select name='np_deps'>";
    $return .= "<option value=''>Выберите отделение</option>";
    foreach ($result as $option){
        $return .= "<option value='$option->ref'>$option->title</option>";
    }
    $return .= "</select>";

    echo $return;

?>