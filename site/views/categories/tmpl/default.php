<?php

if(is_array($this->items))

    foreach($this->items as $item) {

        $link = 'index.php?option=com_shop&view=category&alias='.$item->alias;

        $html = "<div> <a href='".JRoute::_($link)."'>".$item->title."</a> <hr> </div>";

        echo $html;
    }

?>