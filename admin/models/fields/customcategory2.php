<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldCustomCategory2 extends JFormField
{

	protected $type = 'CustomCategory2';

	protected function getInput()
	{
		$html = '<select id="'.$this->id.'" name="'.$this->name.'">';

		$db = JFactory::getDbo();

                $db->setQuery("select id as value, title as text from #__z_shop_discounts order by title asc");
                $dis = $db->loadObjectList();

                for ($i=0; $i < count($dis); $i++) { 
                	if ($dis[$i]->value == $this->value)
                		$selected = ' selected ';
                        else
                                $selected = '';
                	$html .= '<option '.$selected.' value="'.$dis[$i]->value.'" >'.$dis[$i]->text.'</option>';
                }

                $html .= '</select>';

		return $html;
	}
}
