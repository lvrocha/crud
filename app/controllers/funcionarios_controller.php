<?php

class funcionariosController{
    
    
    public $funcionarios;
    public $twig;
    
    public function __construct(){
        $this->funcionarios = new Funcionarios();
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $this->twig = new \Twig\Environment($loader);
    }
    
    public function index(){
        $template = $this->twig->load('funcionarios.html');
        $parametros = array();
        
        $parametros['link_editar'] = BASE_URL."?controller=funcionarios&acao=editar&id=";
        $parametros['link_deletar'] = BASE_URL."?controller=funcionarios&acao=deletar&id=";
        $parametros['link_adicionar'] = BASE_URL."?controller=funcionarios&acao=adicionar";
        $parametros['link_pdf'] = BASE_URL."?controller=funcionarios&acao=exportPdf";
        $parametros['link_ver'] = BASE_URL."?controller=funcionarios&acao=ver&id=";
        
        $valor = $this->funcionarios->readFuncionario();
        $parametros['funcionarios'] = $valor;
        $conteudo = $template->render($parametros);
        echo $conteudo;
        
    }
    
    public function ver(){
        $id = $_GET['id'];
        if(isset($id)){
            $funcionario = $this->funcionarios->searchFuncionarios($id);
            $template = $this->twig->load('funcionariosdetalhes.html');
            $parametros = array();
            $parametros['funcionario'] = $funcionario;
            $parametros['link_pdf'] = BASE_URL."?controller=funcionarios&acao=exportPdf";
            $parametros['link_inicio'] = BASE_URL;
            $conteudo = $template->render($parametros);
            echo $conteudo;
        }else{
            $erro = "Houve algum problema ao visualizar!";
            $this->mensagem($erro);
        }
    }
    
    public function editar(){
        $id = $_GET['id'];
        if(isset($id)){
            $funcionario = $this->funcionarios->searchFuncionarios($id);
            $template = $this->twig->load('editarfuncionario.html');
            $parametros = array();
            $parametros['funcionario'] = $funcionario;
            $parametros['adicionarFuncionario'] = BASE_URL."?controller=funcionarios&acao=store";
            
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
        }else{
            $erro = "Houve algum problema ao editar!";
            $this->mensagem($erro);
        }
    }
    
    public function adicionar(){
        
        $template = $this->twig->load('adicionarFuncionario.html');
        $parametros = array();
        $parametros['adicionarFuncionario'] = BASE_URL."?controller=funcionarios&acao=store";
        
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
    
    public function store(){
        $dados = $_POST;
        #var_dump($dados);
        if(isset($dados['id'])){
            $editar = $this->funcionarios->updateFuncionarios($dados);
            if($editar){
                $sucesso = "Funcionario editado com sucesso!";
                $this->mensagem($sucesso);
            }else{
                $erro = "Houve algum problema ao editar!";
                $this->mensagem($erro);
            }
        }else{
            $cadastrar = $this->funcionarios->createFuncionario($dados);
            if($cadastrar){
                $sucesso = "Funcionario criado com sucesso!";
                $this->mensagem($sucesso);
            }else{
                $erro = "Houve algum problema ao inserir!";
                $this->mensagem($erro);
            }
        }
    }
    
    public function deletar(){
        $id = $_GET['id'];
        if (isset($id)) {
            if ($this->funcionarios->deleteFuncionarios($id)== true) {
                $template = $this->twig->load('deletefuncionario.html');
                $parametros = array();
                $parametros['mensagem'] = "Registro deletado com sucesso!";
                $parametros['link_inicio'] = BASE_URL;
                
                $conteudo = $template->render($parametros);
                echo $conteudo;
            }else{
                $mensagem = "Houve algum erro ao deletar!";
                $this->mensagem($mensagem);
            }     
        }else{
            $mensagem = "Houve algum erro ao deletar!";
            $this->mensagem($mensagem);
        }
    }
    
    public function exportPdf(){
        $id = $_GET['id'];
        $funcionario = $this->funcionarios->searchFuncionarios($id);
        $template = $this->twig->load('funcionariosdetalhes.html');
        $parametros = array();
        $parametros['funcionario'] = $funcionario;
        $parametros['link_pdf'] = BASE_URL."?controller=funcionarios&acao=exportPdf";
        $parametros['link_inicio'] = BASE_URL;
        $conteudo = $template->render($parametros);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($conteudo);
        $mpdf->Output();
    }
}
