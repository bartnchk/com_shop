<?php

defined('_JEXEC') or exit();

class ShopTableProduct extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_products', 'id', $db); 
	}
}