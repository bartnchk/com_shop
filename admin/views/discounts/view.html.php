<?php

defined('_JEXEC') or exit();

class ShopViewDiscounts extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'discounts' );
		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_DISCOUNTS_TITLE') );
		JToolBarHelper::addNew('discount.add');
		JToolBarHelper::editList('discount.edit');

		JToolBarHelper::deleteList('', 'discounts.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}