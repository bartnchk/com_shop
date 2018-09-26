<?php

defined('_JEXEC') or exit();

class ShopControllerPayments extends JControllerAdmin {

	public function getModel($name = 'Payment', $prefix = 'ShopModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}
}