<?php

defined('_JEXEC') or exit();

class ShopTablePayment extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_payments', 'id', $db);
	}
}