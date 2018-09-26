<?php

defined('_JEXEC') or exit();

class ShopViewProduct extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title(JText::_('COM_SHOP_NEW_PRODUCT_TITLE') );
		JToolBarHelper::apply('product.apply');
		JToolBarHelper::save('product.save');
		JToolBarHelper::cancel('product.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}