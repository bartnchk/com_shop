<?php

defined('_JEXEC') or exit();

class ShopModelPayments extends JModelList {

	protected function getListQuery() {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
		$query->from('#__z_shop_payments');
		$query->order('title asc');

		return $query;
	}
}