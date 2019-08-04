<?php

class loginController{
    private $twig;
    private $usuario;
    public function __construct(){        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $this->twig = new \Twig\Environment($loader);
        $this->usuario = new Usuario();
        session_start();
    }

    public function index(){
        $template = $this->twig->load('login/login.html');
        $parametros = array();
        $mensagem = null;
        if (isset($_GET['erro'])) {
            $mensagem = "Usuário ou senha incorretos";//ajustar erro
        }
        if (isset($_GET['mensagem'])){
            if ($_GET['mensagem']=='thanks') {
                $mensagem = "Obrigado por usar nosso sistema!";
            }elseif($_GET['mensagem']=='needlogin'){
                $mensagem = "Você precisa estar logado!";
            }            
        }
        
        
        if(isset($mensagem)){
            $parametros['mensagem'] = $mensagem;
        }
        $parametros['form_autenticao'] = BASE_URL."?controller=login&acao=autenticar";
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function mensagem($dados){
        $template = $this->twig->load('mensagem.html');
        $parametros = array();
        $parametros['mensagem'] = $dados;
        $parametros['link_inicio'] = BASE_URL;
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function autenticar(){
        $usuario = $_POST['login'];
        $senha = $_POST['password'];
        if(isset($usuario) && isset($senha)){
            if($this->usuario->verifica($usuario, $senha)){
                $_SESSION['logado'] = true;
                header('Location: '.BASE_URL.'?controller=funcionarios');
            }else{
                session_destroy();
                header('Location: '.BASE_URL.'?controller=login&erro=login');
            }
        }
        #var_dump($_POST);
    }
    
}