<?php

defined('_JEXEC') or exit();

class ShopTableOption extends JTable {

	public function __construct(&$db) {
		parent::__construct('#__z_shop_options', 'id', $db);
	}
}