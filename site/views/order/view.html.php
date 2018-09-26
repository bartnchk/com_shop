<?php

    defined('_JEXEC') or die();

    class ShopViewCart extends JViewLegacy {

        protected $items;
        protected $pagination;
        protected $state;

        public function display($tpl = NULL) {

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
            $this->state = $this->get('State');

            parent::display($tpl);
        }
    }

?>