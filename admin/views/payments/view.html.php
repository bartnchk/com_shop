<?php

defined('_JEXEC') or exit();

class ShopViewPayments extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'payments' );
		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_PAYMENTS_TITLE') );
		JToolBarHelper::addNew('payment.add');
		JToolBarHelper::editList('payment.edit');

		JToolBarHelper::deleteList('', 'payments.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}