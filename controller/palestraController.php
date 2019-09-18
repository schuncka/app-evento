<?php
include_once('././dao/Palestra.php');
include_once('././dao/PalestraDAO.php');
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class palestraController{

//inicio palestra
public function listar(Request $request, Response $response, $args) {
    $response->getBody()->write("Listar palestras");
      $dao= new PalestraDAO;   
      $palestra = $dao->listar();
  
      $response = $response->withJSON($palestra);    
      return $response;
  }
  public function buscarId(Request $request, Response $response, $args) {
      $id = $args["id"];
      $response->getBody()->write("Listar palestra Id");
      $dao= new PalestraDAO; 
      $palestra = $dao->buscarPorId($id);
      $response = $response->withJSON($palestra); 
      return $response;
  }
  
   public function insere(Request $request, Response $response, $args){
    
    $data = $request->getParsedBody();
    
    $nomePalestra = $data['nomePalestra'];
    $palestrante  = $data['palestrante'];
    $inicio       = $data['inicio'];  
    $fim          = $data['fim'];
    $palestra = new Palestra(0, $nomePalestra, $palestrante, $inicio, $fim);
      
    $dao= new PalestraDAO; 
    $palestra = $dao->inserir($palestra);
      
      $response = $response->withJSON($palestra,201);
      return $response;
  }
  
   function atualizar(Request $request, Response $response, $args) {
      
      $data = $request->getParsedBody();
    
      $id           = $args['id'];
      $nomePalestra = $data['nomePalestra'];
      $palestrante  = $data['palestrante'];
      $inicio       = $data['inicio'];  
      $fim          = $data['fim'];
  
      $dao= new PalestraDAO; 
      $palestra = new Palestra($id, $nomePalestra, $palestrante, $inicio, $fim);
  
      $dao->atualizar($palestra);
      $palestra = $dao->buscarPorId($id);
  
      $response = $response->withJSON($palestra);     
      return $response;
  }
  
  
  public function deletar(Request $request, Response $response, $args) {
   
    $data = $request->getParsedBody();  
    $id   = $args['id'];
  
    $dao= new PalestraDAO;   
    $dao->deletar($id);
  
    $success = $dao->deletar($id);
    if (!$success){
     // $response = $response->withStatus(204);
      $response->getBody()->write("registro não encontrado");
    }
    else {
      $response->getBody()->write("palestra deletada id: ". $id);
      
    }
    return $response;
  
  }
  
  ///fim palestra
//listar
//buscarId
//inserir
//atualizar
//deletar


}

?>