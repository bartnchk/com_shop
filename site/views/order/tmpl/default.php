<?php

    $session = JFactory::getSession();
    $products = $session->get('products');

    $html = '';

    if( is_array($products) ) {

        foreach ($products as $product) {
            $html .= "Title: " . $product['title'] . "<br>";
            $html .= "Option: " . $product['options'] . " ";
            $html .= "<button data-id='".$product['id']."'>х</button>";
            $html .= "<br><br>";
        }

        $html .= "<button>Офрмить заказ</button>";
    }



    $document = JFactory::getDocument();

    JHtml::_('jquery.framework', false);

    $document->addScriptDeclaration('
    
        $(document).ready(function(){
            $("button").on("click", function(){

                var attr = $(this).attr("data-id");
                        
                $.ajax({
                    url: location.origin + "/components/com_shop/ajax/prod_del.php",
                    type: "post",
                    data: "attr=" + attr, 
                    success: function(result) {
                        if (result == "done")
                            location.reload(true);
                    }
                });    
            });
        });
            
    ');

    echo $html;

?>