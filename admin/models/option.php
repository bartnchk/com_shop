<?php

defined('_JEXEC') or exit();

class ShopModelOption extends JModelAdmin {

	public function getForm($data = array(), $loadData = true) {

		$form = $this->loadForm(
			'com_shop.option',
			'option',
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

        $input = JFactory::getApplication()->input;

        $options_arr = $input->getArray()['opts'];

        foreach($options_arr as $key => $value)
        {
            if($value == '')
                unset($options_arr[$key]);
        }

        print_r($options_arr);

        sort($options_arr);

        print_r($options_arr);

        $table->value = json_encode($options_arr);
    }

	public function getTable($type = 'Option', $prefix = 'ShopTable', $config = array()) {

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