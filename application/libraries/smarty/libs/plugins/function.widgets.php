<?php
function smarty_function_widgets($params,&$smarty){
        
    $path = $params['path'];
    $args = isset($params['args']) ? $params['args'] : NULL;
    
    if($path){
        $ps = explode('/', $path);
        
        $controller = $ps[0];
        $method = $ps[1];
        
        require_once APPPATH.'controllers/'.$controller.'.php';
                
        $c = new $controller;
        
        if(!isset($params['args']))
            $c->$method();
        else
            $c->$method($args);
    }
}