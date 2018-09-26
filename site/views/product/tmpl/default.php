<?php

    $options_array = json_decode($this->items[0]->options);
    $video = $this->items[0]->video;
    $price = $this->items[0]->price;
    $title = $this->items[0]->title;
    $_id = $this->items[0]->id;
    $image = $this->images[0]->file_name;

    $html = "<div><h3>".$this->items[0]->title."</h3></div><hr>";

    if($this->items[0]->availability == 1)
        $html .= "<div>Товар в наличии</div><br>";
    else
        $html .= "<div>Товара нет в наличии</div><br>";

    $html .= "<div>Цена: $price</div>";
             
    $html .= "<div><h5>".$this->items[0]->description."</h5></div><hr>";

            if(is_array($options_array)) {
                $html .= "<div><h5><select id='data-options'>";
                foreach ($options_array as $option)
                    $html .= "<option>". $option . "</option>";
                $html .= "</select></h5><div>";
            }

    $html .= "    
              <button id='buy' onclick='buy()' 
                 data-id='".$_id."' 
                 data-title='".$title."'
                 data-price='".$price."'
                 data-image='".$image."'>
                 Добавить в корзину
              </button><hr>
              ";

    $html .= $video;

    if( !empty($this->images) )
    {
        foreach ($this->images as $image)
            $html .= "<div><img src='../../images/products/".$image->file_name."'></div>";
    }

    JHtml::_('jquery.framework', false);
    $document = JFactory::getDocument();
    $document->addScriptDeclaration('
    
        function buy() {
        
            var id       = $("#buy").attr("data-id");
            var title    = $("#buy").attr("data-title");
            var price    = $("#buy").attr("data-price");
            var image    = $("#buy").attr("data-image");
            var options  = $("#data-options").val();
            
            $.ajax({
                url: location.origin + "/components/com_shop/ajax/prod_add.php",
                type: "post",
                data: ({id:id, title:title, price:price, image:image, options:options}), 
                success: alert("Продукт в корзине")
            });
        }               
                
    ');

    echo $html;

?>