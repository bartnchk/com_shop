<?php

defined('_JEXEC') or exit();

class ShopControllerDiscounts extends JControllerAdmin {

	public function getModel($name = 'Discount', $prefix = 'ShopModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}
}