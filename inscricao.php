<?php
  include_once 'palestra.php';
  include_once 'pessoa.php';
  include_once 'palestraDao.php';
  include_once 'pessoaDao.php';
    class Inscricao  {
        public $id;
        public $idPalestra;
        public $idPessoa;
        

       function __construct($id, $idPalestra, $idPessoa){           
            $this->id = $id;
            $this->idPalestra = $idPalestra;
            $this->idPessoa = $idPessoa;
        }



        function getId(){
            return $this->id;
        }
        function getIdPalestra(){
            return $this->idPalestra;
        }
        function getIdPessoa(){
            return $this->idPessoa;
        }

        function setId($id){
            $this->id = $id;
        }
        function setIdPalestra($idPalestra){
          
            $this->idPalestra = $idPalestra;
        }
        function setIdPessoa($idPessoa){
            $this->idPessoa = $idPessoa;
        }


    }
    
?>