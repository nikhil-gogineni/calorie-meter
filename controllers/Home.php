<?php 

class Home extends Controller {

    public static function onLoad($viewName){
        require_once("./views/$viewName.php");
    }

}
?>