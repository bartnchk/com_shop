<?php

defined('_JEXEC') or exit();

class ShopViewCategories extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'categories' );
		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_SUBMENU_CATEGORIES') );
		JToolBarHelper::addNew('category.add');
		JToolBarHelper::editList('category.edit');
		JToolBarHelper::deleteList('', 'categories.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}