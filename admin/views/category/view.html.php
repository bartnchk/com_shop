<?php

defined('_JEXEC') or exit();

class ShopViewCategory extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_PRODUCTS_CATEGORY') );
		JToolBarHelper::apply('category.apply');
		JToolBarHelper::save('category.save');
		JToolBarHelper::cancel('category.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}