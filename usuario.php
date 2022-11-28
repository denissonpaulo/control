<?php

class PojoUsuario {

    private $cod_usuario;
    private $login;
    private $senha;

    public function getCod_usuario() {
        return $this->cod_usuario;
    }

    public function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($nome) {
        $this->nome = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

//  Alterando conteudo para minusculo
//    public function setAtivo($ativo) {
//        $this->ativo = strtolower($ativo);
//    }


}

?>
