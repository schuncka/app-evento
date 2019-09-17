<?php
    class Palestra {
        public $id;
        public $nomePalestra;
        public $palestrante;
        public $inicio;
        public $fim;

       function __construct($id, $nomePalestra, $palestrante, $inicio, $fim){           
            $this->id = $id;
            $this->nomePalestra = $nomePalestra;
            $this->palestrante = $palestrante;
            $this->inicio = $inicio;
            $this->fim = $fim;            
        }

        function getId(){
            return $this->id;
        }
        function getNomePalestra(){
            return $this->nomePalestra;
        }
        function getPalestrante(){
            return $this->palestrante;
        }
        function getInicio(){
            return $this->inicio;
        }
        function getFim(){
            return $this->fim;
        }

        function setId($id){
            $this->id = $id;
        }
        function setNomePalestra($nomePalestra){
            $this->nomePalestra = $nomePalestra;
        }
        function setPalestrante($palestrante){
            $this->palestrante = $palestrante;
        }        
        function setInicio($inicio){
            $this->inicio = $inicio;
        }
        function setFim($fim){
            $this->fim = $fim;
        }


    }
?>