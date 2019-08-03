<?php

class funcionariosController{


    public $funcionarios;
    public $twig;

    public function __construct()
    {
        $this->funcionarios = new Funcionarios();
       
        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $this->twig = new \Twig\Environment($loader);
    }
    
    public function index(){
        try {
            $template = $this->twig->load('funcionarios.html');
            $valor = $this->funcionarios->readFuncionario();
            
            $parametros = array();
            $parametros['funcionarios'] = $valor;
            $parametros['link_editar'] = BASE_URL."?controller=funcionarios&acao=editar&id=";
            $parametros['link_deletar'] = BASE_URL."?controller=funcionarios&acao=deletar&id=";
            $parametros['link_adicionar'] = BASE_URL."?controller=funcionarios&acao=adicionar";
            $parametros['link_pdf'] = BASE_URL."?controller=funcionarios&acao=exportPdf";
            $parametros['link_ver'] = BASE_URL."?controller=funcionarios&acao=ver&id=";
            
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function adicionar(){
     
        $template = $this->twig->load('adicionarFuncionario.html');
        $parametros = array();
        $parametros['adicionarFuncionario'] = BASE_URL."?controller=funcionarios&acao=store";
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function addsucesso(){
        $template = $this->twig->load('addsucesso.html');
        $parametros = array();
        $parametros['mensagem'] = "Colaborador cadastrado com sucesso!";
        $parametros['link_inicio'] = BASE_URL;
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function errosucesso(){
        $template = $this->twig->load('addsucesso.html');
        $parametros = array();
        $parametros['mensagem'] = "Houve algum erro ao inserir!";
        $parametros['link_inicio'] = BASE_URL;
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    
    public function store(){
        $dados = $_POST;
        
        $cadastrar = $this->funcionarios->createFuncionario($dados);
        if($cadastrar){
            $this->addsucesso();
        }else{
            $this->adderro();
        }
    }
}
