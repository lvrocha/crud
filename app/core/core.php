<?php

class Core{
    public function start($urlGet){
        
        if (isset($urlGet['controller'])) {
            $controller = $urlGet['controller'].'Controller';
        }else{
            $controller = "funcionariosController";
        }

        if(isset($urlGet['acao'])){
            $acao = $urlGet['acao'];
        }else{
            $acao = "index";
        }

        if(!class_exists($controller)){
            $controller =  "errorController";
        }

        if(!method_exists($controller,$acao)){
            $acao = "index";
        }
        call_user_func_array(array(new $controller, $acao), array());
    }
}