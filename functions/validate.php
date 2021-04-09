<?php

function checkEmpty($var){
    if (empty($var)){
        return false;
    }
    else {
        return true;
    }
}
function checkEmail($email){
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    else {
        return true;
    }
}

function checkCity ($var,$minValue){
    if (strlen($var) <= $minValue){
        return false;

    }
    else {
        return true;
    }

}
function filterString($string)
    {
        $string = trim($string);
        $string = filter_var($string,FILTER_SANITIZE_STRING);
        /* FILTER_SANTITIZE_STRING: it remove all html tags from the string
        and remove or all characters with ascii value > 127 
        The trim(): function removes whitespace and other 
        predefined characters from both sides of a string. */ 
        return $string;
    }

?>