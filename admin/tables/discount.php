<?php

defined('_JEXEC') or exit();

class ShopTableDiscount extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_discounts', 'id', $db);
	}
}