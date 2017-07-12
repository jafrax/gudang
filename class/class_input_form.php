<?php
class input_form{
    function input_post($input){
        $res = addslashes($_POST[$input]);
        return $res;
    }
        
}
?>