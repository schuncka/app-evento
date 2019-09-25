<?php
    class Usuario {
        public $id;
        public $nome;
        public $login;
        public $senha;
        public $tipo;

       function __construct($id, $nome, $login, $senha, $tipo){           
            $this->id = $id;
            $this->nome = $nome;
            $this->login = $login;
            $this->senha = $senha;
            $this->tipo = $tipo;            
        }

        function getId(){
            return $this->id;
        }
        function getNome(){
            return $this->nome;
        }
        function getLogin(){
            return $this->login;
        }
        function getSenha(){
            return $this->senha;
        }
        function getTipo(){
            return $this->tipo;
        }

        function setId($id){
            $this->id = $id;
        }
        function setNome($nome){
            $this->nome = $nome;
        }
        function setLogin($login){
            $this->login = $login;
        }        
        function setSenha($senha){
            $this->senha = $senha;
        }
        function setTipoUsuario($tipo){
            $this->tipo = $tipo;
        }


    }
?>