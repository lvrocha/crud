<?php

class loginController{
    public $twig;
    public function __construct(){        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $this->twig = new \Twig\Environment($loader);
    }

    public function index(){
        $template = $this->twig->load('login/login.html');
        $parametros = array();
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    
}