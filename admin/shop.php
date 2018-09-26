<?php

defined('_JEXEC') or exit();

require_once JPATH_COMPONENT.'/helpers/shop.php';

$controller = JControllerLegacy::getInstance('Shop');

$input = JFactory::getApplication()->input;

$task = $input->get('task', 'display');

$controller->execute($task);

$controller->redirect();