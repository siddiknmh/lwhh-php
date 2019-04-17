<?php

function isChecked($inputName, $value){
    if(isset($_REQUEST[$inputName]) && is_array($_REQUEST[$inputName]) && in_array($value, $_REQUEST[$inputName])){
        return " checked ";
    }
}

function isBikeChecked($value){
    if(isset($_REQUEST['bikes']) && is_array($_REQUEST['bikes']) && in_array($value, $_REQUEST['bikes'])){
        return " checked ";
    }
}


function selectOptions($options, $selectedvalu){
    foreach ( $options as $option ) {
        $selected = '';
        $option = strtolower($option);
        if(in_array($option, $selectedvalu)){
            $selected = 'selected';
        }
        printf("<option value='%s' %s>%s</option>\n", $option, $selected, ucwords($option));
    }
}