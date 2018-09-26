<?php

defined('_JEXEC') or exit();

class ShopModelDiscounts extends JModelList {

	protected function getListQuery() {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
		$query->from('#__z_shop_discounts');
		$query->order('title asc');

		return $query;
	}
}