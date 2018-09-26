<?php

    defined('_JEXEC') or die();

    class ShopViewCart extends JViewLegacy {

        protected $items;
        protected $pagination;
        protected $state;
        protected $delivinfo;

        public function display($tpl = NULL) {

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
            $this->state = $this->get('State');
            $this->delivinfo = $this->get('Delivinfo');

            $step = $this->get('Step');
            $cart = $this->get('Cart');

            if (!$cart) {
                parent::display('empty');
            } else {
                if ($step == 0)
                    parent::display($tpl);
                else if ($step == 1)
                    parent::display('step2');
            }
        }
    }

?>