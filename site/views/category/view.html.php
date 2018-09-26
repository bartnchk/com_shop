<?php

    defined('_JEXEC') or die();

    class ShopViewCategory extends JViewLegacy {

        protected $items;
        protected $pagination;
        protected $state;
        protected $category;
        protected $images;

        public function display($tpl = NULL) {

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
            $this->state = $this->get('State');
            $this->category = $this->get('Category');

            parent::display($tpl);
        }
    }

?>