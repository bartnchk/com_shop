<?php

    $session = JFactory::getSession();

    $products = $session->get('products');

    $total_price = 0;

    $html = '<form method="post">';



    if( !empty ($products) ) {

        foreach ($products as $product) {

            $html .= "Title: " . $product['title'] . "<br>";

            $html .= "<button data-id='".$product['id']."' data-price='".$product['price']."' class='plus'>+</button>
                      <input name='qnt[\"".$product['id']."-".$product['options']."\"]' readonly class='qnt-".$product['id']."' data-id='".$product['id']."' type='text' style='width: 15px' value='".$product['qnt']."'>
                      <button data-id='".$product['id']."' data-price='".$product['price']."' class='minus'>-</button>
                      <br>";

            $html .= "Option: " . $product['options'] . "<br><br>";
            $html .= "<button class='del' data-option='".$product['options']."' data-id='".$product['id']."'>X</button><br><br>";
            $html .= "Product price:" . $product['price'];
            $html .= "<div style='width:270px'><img src='../../images/products/".$product['image']."'></div>";
            $html .= "<hr>";

            $total_price += $product['price'] * $product['qnt'];

            $html .= "<input type='hidden' name='products[]' value='" . $product['price'] . "'>";

        }

        $html .= "Total Price: <span class='total-price'>".$total_price."</span><br><br>";

        $html .= "<div style='border:1px solid black; padding:10px'>Варианты доставки:<br><br>";

        foreach ($this->items as $item)
        {
            $html .= "<input name='delivery' type='radio' value='" . $item->title . "'> ";
            $html .= $item->title . "<br>";
        }

        $html .= "</div>";


        $html .= "<br><br><button>Оформить заказ</button>";
        $html .= "<input type='hidden' name='step' value='1'>";
    }

    $html .= "</form>";



    $document = JFactory::getDocument();

    JHtml::_('jquery.framework', false);

    $document->addScriptDeclaration('
    
        $(document).ready(function(){
            $("button.del").on("click", function(){

                var attr = $(this).attr("data-id");
                var option = $(this).attr("data-option");
                        
                $.ajax({
                    url: location.origin + "/components/com_shop/ajax/prod_del.php",
                    type: "post",
                    data: "attr=" + attr + "&option=" + option, 
                    success: function(result) {
                        if (result == "done")
                            location.reload(true);
                    }
                });    
            });
            
            $("button.plus").on("click", function(){
                var id = $(this).data("id");                
                var qnt = $("input.qnt-"+id).val();
                $("input.qnt-"+id).val(++qnt);
                 
                var price = $(this).data("price");
                var total_price = $(".total-price").text();
                
                price = parseInt(price);
                total_price = parseInt(total_price);
                
                total_price += price;
                
                $(".total-price").text(total_price);
                
                return false;
            });
            
            $("button.minus").on("click", function(){
                var id = $(this).data("id");                
                var qnt = $("input.qnt-"+id).val();
                
                var price = $(this).data("price");
                var total_price = $(".total-price").text();
                
                price = parseInt(price);
                total_price = parseInt(total_price);
                
                if (--qnt > 0) {
                    $("input.qnt-"+id).val(qnt);
                    total_price -= price;
                    $(".total-price").text(total_price);
                }
                
                return false;
            });
        });
            
    ');

    echo $html;

?>