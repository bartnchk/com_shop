<?php

defined('_JEXEC') or exit();

class ShopControllerDeliveries extends JControllerAdmin {

	public function getModel($name = 'Delivery', $prefix = 'ShopModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}
}