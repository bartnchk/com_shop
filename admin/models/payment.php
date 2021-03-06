<?php

defined('_JEXEC') or exit();

class ShopModelPayment extends JModelAdmin {

	public function getForm($data = array(), $loadData = true) {

		$form = $this->loadForm(
			'com_shop.payment',
			'payment',
			array(
				'control' => 'jform',
				'load_data' => $loadData
				)
			);

		if (empty($form))
			return false;
		else
			return $form;
	}

	public function getTable($type = 'Payment', $prefix = 'ShopTable', $config = array()) {
		return JTable::getInstance($type, $prefix, $config);
	}

	public function delete (&$pks) {

		parent::delete($pks);
  }

	protected function loadFormData() {
		$data = $this->getItem();

		return $data;
	}
}