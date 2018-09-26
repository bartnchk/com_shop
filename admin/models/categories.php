<?php

defined('_JEXEC') or exit();

class ShopModelCategories extends JModelList {

	protected function getListQuery() {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');

		$query->from('#__z_shop_categories');

		$query->order('title asc');

		return $query;
	}
}