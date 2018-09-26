<?php

defined('_JEXEC') or exit();

class ShopModelCategory extends JModelAdmin {

	public function getForm($data = array(), $loadData = true) {

		$form = $this->loadForm(
			'com_shop.category',
			'category',
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

    protected function prepareTable($table) {

        $table->check();

        $table->store();

        if (empty( $table->alias )) {

            $table->alias = JApplicationHelper::stringURLSafe($table->title);

        } else {

            $table->alias = JApplicationHelper::stringURLSafe($table->alias);
        }
    }

	public function getTable($type = 'Category', $prefix = 'ShopTable', $config = array()) {
		
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