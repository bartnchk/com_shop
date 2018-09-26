<?php

defined('_JEXEC') or die;

class ShopModelCart extends JModelList {

    protected $_step = 0;
    protected $_cart = 0;

    public function __construct()
    {
        parent::__construct();

        $input = JFactory::getApplication()->input;

        $this->_step = $input->get('step', 0);

        $session = JFactory::getSession();
        $this->_cart = $session->get('products', false);

        if ($this->_step == 1) {
            $this->updateCart();
        }

        if ($this->_step == 2) {
            // get payment type
            $this->createOrder();
        }
    }

    protected function getListQuery() {

        $query = parent::getListQuery();

        $query->select('*');

        $query->from('#__z_shop_deliveries');

        return $query;
    }

    public function getStep() {

        return $this->_step;
    }

    public function getCart() {

        return $this->_cart;
    }

    public function getDelivinfo() {

        $this->_db->setQuery("select * from #__z_shop_nova_poshta_cities order by title");

        $result = $this->_db->loadObjectList();

        return $result;
    }

    protected function updateCart() {

        $cart = $this->_cart;

        $input = JFactory::getApplication()->input;
        $qnts = $input->get('qnt', array(), 'ARRAY');

        foreach ($qnts as $key => $qnt){

            $key = trim($key, "\"");
            $key = explode("-", $key);
            $id = $key[0];
            $option = $key[1];

            foreach ($cart as $cart_key => $product) {
                if ($product['id'] == $id && $product['options'] == $option) {
                    $cart[$cart_key]['qnt'] = $qnt;
                }
            }
        }

        $session = JFactory::getSession();
        $session->set('products', $cart);
    }

    protected function createOrder() {

    }
}