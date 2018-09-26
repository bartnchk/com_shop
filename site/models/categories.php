<?php

defined('_JEXEC') or die;

class ShopModelCategories extends JModelList {

    protected function getListQuery() {

        $query = parent::getListQuery();

        $query->select($this->getState('list.select', 'c.*'));

        $query->from('#__z_shop_categories AS c');

        return $query;
    }
}