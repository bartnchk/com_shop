<?php

defined('_JEXEC') or exit();

class ShopViewDiscount extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_DISCOUNT_TITLE') );
		JToolBarHelper::apply('discount.apply');
		JToolBarHelper::save('discount.save');
		JToolBarHelper::cancel('discount.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}