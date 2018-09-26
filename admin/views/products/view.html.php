<?php

defined('_JEXEC') or exit();


class ShopViewProducts extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

        $this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
        $state = $this->get('State');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'products' );
		$this->sidebar = JHtmlSidebar::render();

        $this->sortDirection = $state->get('list.direction');
        $this->sortColumn = $state->get('list.ordering');

		parent::display($tpl);
}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_SUBMENU_PRODUCTS') );
		JToolBarHelper::addNew('product.add');
		JToolBarHelper::editList('product.edit');
		JToolBarHelper::deleteList('', 'products.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}

