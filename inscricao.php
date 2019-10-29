<?php
    class Inscricao  {
        public $id;
        public $idPalestra;
        public $idPessoa;
        

       function __construct($id, $idPalestra, $idPessoa){           
            $this->id = $id;
            $this->idpalestra = $idPalestra;
            $this->idpessoa = $idPessoa;            
        }



        function getId(){
            return $this->id;
        }
        function getIdPalestra(){
            return $this->idpalestra;
        }
        function getIdPessoa(){
            return $this->idpessoa;
        }

        function setId($id){
            $this->id = $id;
        }
        function setIdPalestra($idPalestra){
          
            $this->idpalestra = $idPalestra;
        }
        function setIdPessoa($idPessoa){
            $this->idpessoa = $idPessoa;
        }


    }
?>