<?php
include_once("pessoa");
include_once("palestra");
    class participante {
        public $pessoa;
        public $palestra;
        

       function __construct($id, $nome, $cpf, $cidade, $tipo){           
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->cidade = $cidade;
            $this->tipo = $tipo;            
        }

        function getId(){
            return $this->id;
        }
        function getNome(){
            return $this->nome;
        }
        function getCpf(){
            return $this->cpf;
        }
        function getCidade(){
            return $this->cidade;
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
        function setCpf($cpf){
            $this->cpf = $cpf;
        }        
        function setCidade($cidade){
            $this->cidade = $cidade;
        }
        function setTipoPessoa($tipo){
            $this->tipo = $tipo;
        }


    }
?>