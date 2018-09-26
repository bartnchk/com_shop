<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldOptions extends JFormField
{

    protected $type = 'Options';


    public function getInput()
    {
        $controller = $this->element['controller'];

        $folder = $this->element['folder'];
        $path = JURI::root();

        $script = '
                   jQuery(document).ready(function($){
                       $("#add_option").on("click", function(){

                           var pics_count = Number($("#pics_count").val());
                           var newCount = pics_count+1;

                           $(".controls-opt").prepend(\'<div class="item-block"><input type="text" name="opts[]"></div><br>\');
                           $("#pics_count").val(newCount);
                       });
                   }); ';

        JFactory::getDocument()->addScriptDeclaration( $script );

        $value = $this->value;

        $html = '<div class="controls-opt">';

        if ($value) {

            $options_array = json_decode($value);

            for($i=0; $i<count($options_array); $i++){
                $html .= "<div><input type='text' name='opts[]' value='".$options_array[$i]."'></div><br>";
            }

        } else {

            $html .= '<div><input type="text" name="opts[]"></div>';
        }

        $html .= '</div>';

        return $html;
    }

    public function getLabel() {

        $html = JText::_('Опции') . ' <button type="button" class="btn btn-mini" id="add_option"><i class=" icon-plus"></i></button>';

        return $html;
    }
}

























//defined('JPATH_BASE') or die;
//
//jimport('joomla.form.formfield');
//
//class JFormFieldOptions extends JFormField
//{
//
//    protected $type = 'Options';
//
//    protected function getInput()
//    {
//
//        $html = '<select id="'.$this->id.'" name="'.$this->name.'">';
//
//        $db = JFactory::getDbo();
//
//        $db->setQuery("select id as value, title as text from #__z_shop_options order by title asc");
//        $opts = $db->loadObjectList();
//
//        for ($i=0; $i < count($opts); $i++) {
//            if ($opts[$i]->value == $this->value)
//                $selected = ' selected ';
//            else
//                $selected = '';
//            $html .= '<option '.$selected.' value="'.$opts[$i]->value.'" >'.$opts[$i]->text.'</option>';
//        }
//
//        $html .= '</select>';
//
//        return $html;
//    }
//}
