<?php

class Controller{

    public static $pageTitle = "Calorie Meter";

    public static function createView($viewName){
        static::$pageTitle = "Calorie Meter | ".$viewName;
        static::onLoad($viewName);
    }
}


?>