<?php
class Funcionarios{
    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function index(){
        echo "funcionarios";
    }

    public function createFuncionario($dados=null){
        if (isset($dados)) {
            $nome = $dados['nome'];
            $data_nasc = $dados['data_nasc'];
            $end_cep = $dados['end_cep'];
            $end_logradouro = $dados['end_logradouro'];
            $end_bairro = $dados['end_bairro'];
            $end_cidade = $dados['end_cidade'];
            $end_estado = $dados['end_estado'];
            $end_numero = $dados['end_numero'];
            $email = $dados['email'];
            $tel_fixo = $dados['tel_fixo'];
            $tel_cel = $dados['tel_cel'];
            $competencia_tec = $dados['competencia_tec'];
            $competencia_compor = $dados['competencia_compor'];
            $sql = $this->mysqli->prepare("INSERT INTO funcionarios (nome, data_nasc, end_cep, end_logradouro, end_bairro, end_cidade, end_estado, end_numero, email, tel_fixo, tel_cel, competencia_tec, competencia_compor) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sql->bind_param("sssssssssssss",$nome, $data_nasc, $end_cep, $end_logradouro, $end_bairro, $end_cidade, $end_estado, $end_numero, $email, $tel_fixo, $tel_cel, $competencia_tec, $competencia_compor);
            if ($sql->execute()==true) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function readFuncionario(){
        $result = $this->mysqli->query("SELECT * FROM funcionarios");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = $row;
        }
        return $array;
    }

    public function updateFuncionarios($dados=null){
        if (isset($dados)) {
            $id = $dados['id'];
            $nome = $dados['nome'];
            $data_nasc = $dados['data_nasc'];
            $end_cep = $dados['end_cep'];
            $end_logradouro = $dados['end_logradouro'];
            $end_bairro = $dados['end_bairro'];
            $end_cidade = $dados['end_cidade'];
            $end_estado = $dados['end_estado'];
            $end_numero = $dados['end_numero'];
            $email = $dados['email'];
            $tel_fixo = $dados['tel_fixo'];
            $tel_cel = $dados['tel_cel'];
            $competencia_tec = $dados['competencia_tec'];
            $competencia_compor = $dados['competencia_compor'];
            $sql = $this->mysqli->prepare("UPDATE 'funcionarios' SET nome = ?, data_nasc = ?, end_cep = ?, end_logradouro = ?, end_bairro = ?, end_cidade = ?, end_estado = ?, end_numero = ?, email = ?, tel_fixo = ?, tel_cel = ?, competencia_tec = ?, competencia_compor = ?");
            $sql->bind_param("sssssssssssss",$nome,  $data_nasc, $end_cep, $end_logradouro, $end_bairro, $end_cidade, $end_estado, $end_numero, $email, $tel_fixo, $tel_cel, $competencia_tec, $competencia_compor);
            if ($sql->execute()==true) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function deleteFuncionarios($id=null){
        if (isset($id)) {
            if ($this->mysqli->query("DELETE FROM funcionarios WHERE id = '".$id."';")==TRUE) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function searchFuncionarios($id=null){
        if (isset($id)) {
            $result = $this->mysqli->query("SELECT * FROM funcionarios WHERE id = '$id'");
            return $result->fetch_array(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }


}