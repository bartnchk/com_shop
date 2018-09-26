<?php

defined('_JEXEC') or exit();

class ShopViewOption extends JViewLegacy {

	protected $form;
	protected $item;

	public function display($tpl = null) {

		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		$this->addToolbar();

		parent::display($tpl);
	}

	protected function addToolbar() {
		JToolBarHelper::title( JText::_('COM_SHOP_OPTION_TITLE') );
		JToolBarHelper::apply('option.apply');
		JToolBarHelper::save('option.save');
		JToolBarHelper::cancel('option.cancel');
	}

	protected function setDocument() {
		$document = JFactory::getDocument();
	}
}