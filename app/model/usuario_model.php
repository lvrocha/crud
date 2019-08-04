<?php
class Usuario{

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
        $this->mysqli->set_charset("utf8");
    }

    public function verifica($usuario ='', $senha = ''){
       # var_dump($usuario);
        #var_dump($senha);
        if (!$usuario || !$senha){
            return false;
        }else{
            $sql = "SELECT * FROM users WHERE email = '$usuario' and senha = MD5('$senha')";
            #var_dump($sql);
            $sql = $this->mysqli->query($sql);
            #var_dump($sql->num_rows);
            if($sql->num_rows > 0){
                return true;
            }else{
                return false;
            }
            
        }
    }

}