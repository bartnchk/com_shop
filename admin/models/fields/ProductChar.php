<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldProductchar extends JFormField
{

    protected $type = 'Productchar';

    protected function getInput()
    {
        $jinput = JFactory::getApplication()->input;
        $id = $jinput->get('id', 0);

        $script = '
                    jQuery(document).ready(function($){

                            $("#'.$this->id.'").on("change", function(){
                            
                                var options = "";
                                var values = $(this).find("option:selected").data("values");
                                if (values) {
                                    
                                    for(var i = 0; i < values.length; i++) {
                                        options += "<input name=\'options[]\' type=\'checkbox\' value=\'"+values[i]+"\'> " + values[i];
                                    }
                                }
                                $(".custom-options").html(options);
                            });
                            
                    });
            ';

        JFactory::getDocument()->addScriptDeclaration( $script );



        $html = '<select id="'.$this->id.'" name="'.$this->name.'">';
        $html .= '<option value="">Выберите характеристику</option>';

        $db = JFactory::getDbo();

        $db->setQuery("select options.id as value, options.title as text, options.value as `values`, products.options 
                        from #__z_shop_options options
                        left join #__z_shop_products products on products.id = $id and products.option_id = options.id
                        order by options.title asc");
        $opts = $db->loadObjectList();

        $custom_options = '';
        for ($i=0; $i < count($opts); $i++) {
            if ($opts[$i]->value == $this->value) {
                $selected = ' selected ';

                $options = json_decode($opts[$i]->values);
                foreach ($options as $option) {
                    $selected_options = $opts[$i]->options ? json_decode($opts[$i]->options) : array();
                    $checked = '';
                    if (in_array($option, $selected_options))
                        $checked = ' checked ';
                    $custom_options .= "<div style='padding-right: 10px; float: left'><input $checked type='checkbox' name='options[]' value='$option'> " . $option . "</div>";
                }
            }
            else
                $selected = '';
            $html .= '<option data-values="'.htmlspecialchars($opts[$i]->values).'" '.$selected.' value="'.$opts[$i]->value.'" >'.$opts[$i]->text.'</option>';
        }

        $html .= '</select>';

        $html .= '<div style="padding-top:12px" class="custom-options">'.$custom_options.'</div>';

        return $html;
    }
}