<?php

defined('_JEXEC') or exit();

class ShopTableDelivery extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_deliveries', 'id', $db);
	}
}