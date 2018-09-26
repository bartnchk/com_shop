<?php

defined('_JEXEC') or exit();

class ShopViewDelivery extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_DILIVERY_TITLE') );
		JToolBarHelper::apply('delivery.apply');
		JToolBarHelper::save('delivery.save');
		JToolBarHelper::cancel('delivery.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}