<?php

class Route
{
    public static $validRoutes = array();
    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;
        if (isset($_GET['url'])) {
            if ($_GET['url'] == $route) {
                $function->__invoke();
            }else{
                require_once "views/NotFound.php";
            }
        }
    }
}
