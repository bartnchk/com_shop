<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldCustomCategory extends JFormField
{

	protected $type = 'CustomCategory';

	protected function getInput()
	{
		$html = '<select id="'.$this->id.'" name="'.$this->name.'">';
        $html .= '<option value="">Выберите категорию</option>';

		$db = JFactory::getDbo();

                $db->setQuery("select id as value, title as text from #__z_shop_categories order by title asc");
                $cat = $db->loadObjectList();

                for ($i=0; $i < count($cat); $i++) { 
                	if ($cat[$i]->value == $this->value)
                		$selected = ' selected ';
                        else
                                $selected = '';
                	$html .= '<option '.$selected.' value="'.$cat[$i]->value.'" >'.$cat[$i]->text.'</option>';
                }

                $html .= '</select>';

		return $html;
	}
}