<?php

if(is_array($this->items))

    foreach($this->items as $item) {

        $link = 'index.php?option=com_shop&view=product&category_alias='.$item->category_alias.'&alias='.$item->alias;
        $html = "
                    <div>
                        <a href='".JRoute::_($link)."'>".$item->title."</a>
                        <hr>
                    </div>
                ";
        echo $html;
    }

?>

