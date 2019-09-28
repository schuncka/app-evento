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
        function getidPalestra(){
            return $this->idpalestra;
        }
        function getidPessoa(){
            return $this->idpessoa;
        }

        function setId($id){
            $this->id = $id;
        }
        function setidPalestra($idPalestra){
            $this->idpalestra = $idPalestra;
        }
        function setPalestrante($idPessoa){
            $this->idpessoa = $idPessoa;
        }


    }
?>