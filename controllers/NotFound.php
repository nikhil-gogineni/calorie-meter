<?php 

class NotFound extends Controller {

    public static function onLoad($viewName){
        require_once("./views/$viewName.php");
    }

}
?>