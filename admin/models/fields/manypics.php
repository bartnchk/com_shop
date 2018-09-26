<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldManypics extends JFormField
{

    protected $type = 'Manypics';


    public function getInput()
    {
        $controller = $this->element['controller'];

        $folder = $this->element['folder'];
        $path = JURI::root();
        
        $script = '
                    jQuery(document).ready(function($){

                            $("#add_pic").on("click", function(){

                                    var pics_count = Number($("#pics_count").val());
                                    var newCount = pics_count+1;

                                    $(".controls-pic").prepend(\'<div class="item-block"><input type="file" name="pics[]"></div><hr>\');

                                    $("#pics_count").val(newCount);
                            });
                            
                            $(".popup-trigger").click(function(){
                                var img = $(this).data("img");
                                $(".bigimg").attr("src", img);
                            });
                    });
            ';

        JFactory::getDocument()->addScriptDeclaration( $script );

        $style = '
                    .controls-pic input {
                    }

                    .controls-pic hr {
                            margin: 5px 0;
                            border: none;
                    }

                    .picone {
                            text-align: center;
                            width:200px;
                            float: left;
                            margin-right: 15px;
                    }

                    .picone img {
                            max-width: 200px;
                            border: solid 2px #000;
                            margin-bottom: 5px;
                            padding: 5px;
                            box-sizing: border-box;
                    }

                    .picone input[type=text] {
                            width: 180px;
                            margin-bottom: 5px;
                    }

                    .picone input[type=radio] {
                        vertical-align: sub;
                    }
                    
                    .pics {
                        padding-top: 20px
                    }
            ';

        JFactory::getDocument()->addStyleDeclaration( $style );

        $value = $this->value;

        if ($value) {

            $html = '
                <div class="controls-pic">
                    <div class="item-block">
                        <input type="file" name="pics[]">
                    </div>
                    
                    <div class="pics"> ';
            
                        for ($i=0; $i < count($value); $i++) {

                            $file = $path.$folder.$value[$i]->file_name;
                
                            $html .= '<div class="picone">
                            <a class="popup-trigger" href="#myModal" data-toggle="modal" data-img="'.$file.'" >
                                <img src="'.$file.'">
                            </a>
                            <button onclick="jQuery(\'#picid\').val('.$value[$i]->id.'); Joomla.submitbutton(\''.$controller.'.deletepic\')">Удалить</button>

                            </div>';
                        }

                        $html .= '</div></div>
                                    <input type="hidden" name="pics_count" id="pics_count" value="'.$i.'">
                                    <input type="hidden" name="picid" id="picid" value="0">';

                        $html .= '
                        
                        <div id="myModal" class="modal fade" style="display: none">
                            <div>

                                <!-- Modal content-->
                                <div>
                                    <div class="modal-body" align="center" style="max-height: 580px">
                                        <img class="bigimg" style="height:580px" src="'.$file.'">
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>';
        } else {

            $html = '
                <div class="controls-pic">
                        <div class="item-block">
                                <input type="file" name="pics[]">
                        </div>
                </div>
                <input type="hidden" name="pics_count" id="pics_count" value="1">
                ';
        }

        return $html;
    }

    public function getLabel() {

        $html = JText::_('Фото (585 х 585 px)') . ' <button type="button" class="btn btn-mini" id="add_pic"><i class=" icon-plus"></i></button>';

        return $html;
    }
}