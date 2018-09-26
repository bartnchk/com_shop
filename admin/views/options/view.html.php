<?php

defined('_JEXEC') or exit();

class ShopViewOptions extends JViewLegacy {

	protected $items;
	protected $pagination;

	public function display($tpl = null) {

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		$this->loadHelper( 'shop' );
		shopHelper::addSubmenu( 'options' );
		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_OPTIONS_TITLE') );
		JToolBarHelper::addNew('option.add');
		JToolBarHelper::editList('option.edit');

		JToolBarHelper::deleteList('', 'options.delete');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}