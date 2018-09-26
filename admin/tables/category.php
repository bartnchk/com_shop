<?php

defined('_JEXEC') or exit();

class ShopTableCategory extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_categories', 'id', $db);
	}
}