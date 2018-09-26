<?php

defined('_JEXEC') or die;

class ShopModelProduct extends JModelList {

    protected $_alias;
    protected $_category_alias;

    public function __construct() {

        $input = JFactory::getApplication()->input;

        $this->_alias = $input->get('alias');
        $this->_category_alias = $input->get('category_alias');

        parent::__construct();
    }

    protected function getListQuery() {

        $query = parent::getListQuery();

        $query->select('p.*');

        $query->from('#__z_shop_products AS p');

        $query->innerJoin('#__z_shop_categories c on c.id = p.id_category and c.alias = "'.$this->_category_alias.'"');

        $query->where('p.alias=\''.$this->_alias.'\'');

        return $query;
    }

    public function _getList($query, $limitstart = 0, $limit = 0) {
        $return = parent::_getList($query, $limitstart = 0, $limit = 0);

        if ($return)
            return $return;

        throw new Exception('', 404);
    }

    public function getImages () {

        $this->_db->setQuery("select * from #__z_shop_images where id_product = (select id from #__z_shop_products where alias = '$this->_alias')");

        $result = $this->_db->loadObjectList();

        return $result;
    }

}