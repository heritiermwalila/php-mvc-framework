<?php

class Router{

    public static function route($url){
       
        //extract controller from $url
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url); //remove the first element of array which is the controller in position 1
        //action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $controller;
        array_shift($url); //remove the first element of array which is the controller in position 1

        //params
        $queryParams = $url;

        $dispatch = new $controller($controller_name, $action);
        if(method_exists($controller, $action)){
            call_user_func_array([$dispatch, $action], $queryParams);
        }else{
            die("That methode does not exist in the controller " . $controller_name . "");
        }
    }
}