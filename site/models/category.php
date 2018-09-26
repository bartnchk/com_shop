<?php

defined('_JEXEC') or die;

class ShopModelCategory extends JModelList {

    protected $alias;

    public function __construct() {

        $input = JFactory::getApplication()->input;

        $this->alias = $input->get('alias');

        parent::__construct();
    }

    protected function getListQuery() {

        $query = parent::getListQuery();

        $query->select('p.*, c.alias as category_alias, images.file_name image, discounts.value percent');

        $query->from('#__z_shop_products AS p');

        $query->innerJoin('#__z_shop_categories c on c.id = p.id_category and c.alias = "'.$this->alias.'"');

        $query->leftJoin('#__z_shop_images images on images.id_product = p.id');

        $query->leftJoin('#__z_shop_discounts discounts on discounts.id = p.discount_id');

        $query->group('p.id');

        return $query;
    }

    public function getCategory () {

        $this->_db->setQuery("select * from #__z_shop_categories where alias = '$this->alias'");

        $result = $this->_db->loadAssoc();

        return $result;
    }

}