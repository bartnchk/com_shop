<?php

defined('_JEXEC') or exit();

class ShopViewPayment extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_PAYMENT_TITLE') );
		JToolBarHelper::apply('payment.apply');
		JToolBarHelper::save('payment.save');
		JToolBarHelper::cancel('payment.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}