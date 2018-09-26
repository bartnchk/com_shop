<?php

defined('_JEXEC') or exit();

class ShopModelOptions extends JModelList {

	protected function getListQuery() {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');

		$query->from('#__z_shop_options');

		$query->order('id asc');

		return $query;
	}
}