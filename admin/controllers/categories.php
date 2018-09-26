<?php

defined('_JEXEC') or exit();

class ShopControllerCategories extends JControllerAdmin {

	public function getModel($name = 'Category', $prefix = 'ShopModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}

}