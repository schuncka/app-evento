<?php
include_once("palestra.php");
include_once("palestraDao.php");

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//listarPalestra  inserirPalestra buscarId  atualizarPalestra  deletarPalestra

class PalestraController{


            //inicio palestra
            public function listarPalestra(Request $request, Response $response, $args) { 
                $dao= new PalestraDAO;   
                $palestra = $dao->listar();

                $response = $response->withJSON($palestra,200);    
                return $response;
            }

            public function buscarId(Request $request, Response $response, $args) {
                $id = $args["id"];
               // var_dump($request->getHeaders());
                $response->getBody()->write("Listar palestra Id");
                
                $dao= new PalestraDAO; 
                $palestra = $dao->buscarPorId($id);
                
                $response = $response->withJSON($palestra); 
                return $response;
            }

            public function inserirPalestra (Request $request, Response $response, $args){
                $response->getBody()->write("Insere palestra");
                $data = $request->getParsedBody();
                
                $nomePalestra = $data['nomePalestra'];
                $palestrante  = $data['palestrante'];
                $inicio       = $data['inicio'];  
                $fim          = $data['fim'];

                
                $palestra = new Palestra(0, $nomePalestra, $palestrante, $inicio, $fim);
var_dump($palestra);
                $dao= new PalestraDAO; 
                $palestra = $dao->inserir($palestra);
                
                $response = $response->withStatus(201);
                $response = $response->withJSON($palestra);
                return $response;
            }

            public function atualizarPalestra(Request $request, Response $response, $args) {
                $response->getBody()->write("Atualiza palestra");
                $data = $request->getParsedBody();
            
                $id           = $args['id'];
                $nomePalestra = $data['nomePalestra'];
                $palestrante  = $data['palestrante'];
                $inicio       = $data['inicio'];  
                $fim          = $data['fim'];


                $palestra = new Palestra($id, $nomePalestra, $palestrante, $inicio, $fim);

                $dao= new PalestraDAO; 
                $dao->atualizar($palestra);
                $palestra = $dao->buscarPorId($id);

                $response = $response->withJSON($palestra);     
                return $response;
            }


            public function deletarPalestra(Request $request, Response $response, $args) {
            
            $data = $request->getParsedBody();  
            $id   = $args['id'];

            $dao= new PalestraDAO;   
            $dao->deletar($id);
            $response->getBody()->write("palestra deletada id: ". $id);
                
            return $response;

            }
}///fim palestra controller

?>