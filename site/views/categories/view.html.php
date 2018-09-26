<?php

    defined('_JEXEC') or die();

    class ShopViewCategories extends JViewLegacy {

        protected $items;
        protected $pagination;

        public function display($tpl = NULL) {

            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');

            if(is_array($this->items)) {

                foreach ($this->items as $item) {

                    $item->slug = $item->alias ? ($item->id.':'.$item->alias) : $item->id;

                }
            }

            parent::display($tpl);
        }
    }

?>