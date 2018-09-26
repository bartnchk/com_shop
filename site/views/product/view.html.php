<?php

    defined('_JEXEC') or die();

    class ShopViewProduct extends JViewLegacy {

        protected $items;
        protected $pagination;
        protected $state;

        public function display($tpl = NULL) {

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
            $this->state = $this->get('State');
            $this->images = $this->get('Images');

            parent::display($tpl);
        }
    }

?>