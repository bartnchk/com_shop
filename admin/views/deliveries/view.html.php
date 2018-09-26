<?php

defined('_JEXEC') or exit();

class ShopViewDeliveries extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'deliveries' );
		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_DILIVERIES_TITLE') );
		JToolBarHelper::addNew('delivery.add');
		JToolBarHelper::editList('delivery.edit');

		JToolBarHelper::deleteList('', 'deliveries.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}