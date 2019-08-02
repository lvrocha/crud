<?php

class Core{
    public function start($urlGet){
        $acao = 'index';
        if (isset($urlGet['controller'])) {
            $controller = $urlGet['controller'].'Controller';
        }else{
            $controller = "funcionariosController";
        }
       
        

        if(!class_exists($controller)){
            $controller =  "errorController";
        }
        call_user_func_array(array(new $controller, $acao), array());
    }
}