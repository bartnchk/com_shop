<?php

defined('_JEXEC') or exit();

class ShopControllerOptions extends JControllerAdmin {

	public function getModel($name = 'Option', $prefix = 'ShopModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}

}