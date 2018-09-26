<?php

    defined('_JEXEC') or die();

    $arr_qnt  = $_POST['qnt'];
    $arr_prod = $_POST['products'];
    $delivery = $_POST['delivery'];

    $sum = 0;

    for ($i=0; $i<count($arr_qnt); $i++)
    {
        $sum += $arr_prod[$i] * $arr_qnt[$i];
    }

    $html  = "<hr><div>Данные покупателя:</div><br>";
    $html .= "<input type='text' placeholder='Фамилия и имя'><br>";
    $html .= "<input type='text' placeholder='Мобилльный телефон'><hr>";

    $html .= "<div>Куда доставить:</div><br>";
    $html .= "<select class='np_city'>";
    $html .= "<option selected value=''>Выберите город</option>";
                foreach ($this->delivinfo as $city)
                    $html .= "<option value='".$city->ref."'>$city->title</option>";
    $html .= "</select>";

    $html .= "<div class='deps'></div>";

    echo $html;

    $document = JFactory::getDocument();

    JHtml::_('jquery.framework', false);

    $document->addScriptDeclaration('

        $( document ).ready(function() {
  
            $("select.np_city").change(function(){
            
                if($(this).val() == 0) return false;
                
                var ref = $(this).val();
                
                $.ajax({
                    url: location.origin + "/components/com_shop/ajax/get_departments.php",
                    method: "post",
                    data: "ref=" + ref, 
                    success: function(result) {
                        $(".deps").html(result);
                    }
                });         
            });
            
        });

    ');

/*"<select>"+
"<option>1</option>"+
"<option>2</option>"+
"<option>3</option>"+
"</select>"*/