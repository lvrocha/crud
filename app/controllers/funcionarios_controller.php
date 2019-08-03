<?php

class funcionariosController{
    
    public function index(){
        try {
            $funcionarios = new Funcionarios();
            $valor = $funcionarios->readFuncionario();
            
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('funcionarios.html');
            
            $parametros = array();
            $parametros['funcionarios'] = $valor;
            $parametros['link_editar'] = BASE_URL."?controller=funcionarios&acao=editar&id=";
            $parametros['link_deletar'] = BASE_URL."?controller=funcionarios&acao=deletar&id=";
            $parametros['link_adicionar'] = BASE_URL."?controller=funcionarios&acao=adicionar";
            $parametros['link_pdf'] = BASE_URL."?controller=funcionarios&acao=exportPdf";
            
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function adicionar(){
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('adicionarFuncionario.html');
        $parametros = array();
        $parametros['adicionarFuncionario'] = BASE_URL."?controller=funcionarios&acao=store";
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    
    public function store(){
        
    }
}
