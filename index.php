<?php
include_once('./dao/Palestra.php');
include_once('./dao/PalestraDAO.php');
include_once('./dao/pessoa.php');
include_once('./dao/pessoaDAO.php');
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();



//inicio palestra
$app->get('/api/palestra', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Listar palestras");
    $dao= new PalestraDAO;   
    $palestra = $dao->listar();

    $response = $response->withJSON($palestra);    
    return $response;
});
$app->get('/api/palestra/{id}', function (Request $request, Response $response, $args) {
    $id = $args["id"];
    $response->getBody()->write("Listar palestra Id");
    $dao= new PalestraDAO; 
    $palestra = $dao->buscarPorId($id);
    $response = $response->withJSON($palestra); 
    return $response;
});

$app->post('/api/palestra', function(Request $request, Response $response, $args){
  $response->getBody()->write("Insere palestra");
  $data = $request->getParsedBody();
  
  $nomePalestra = $data['nomePalestra'];
  $palestrante  = $data['palestrante'];
  $inicio       = $data['inicio'];  
  $fim          = $data['fim'];

    $dao= new PalestraDAO; 
    $palestra = new Palestra(0, $nomePalestra, $palestrante, $inicio, $fim);
    $palestra = $dao->inserir($palestra);
    $response = $response->withStatus(201);
    $response = $response->withJSON($palestra);
  return $response;
});

$app->put('/api/palestra/{id}', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Atualiza palestra");
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
});


$app->delete('/api/palestra/{id}', function (Request $request, Response $response, $args) {
 
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

});

///fim palestra
///inicio pessoa



$app->get('/api/pessoa', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Listar Pessoas");
    $dao= new PessoaDAO;   
    $pessoa = $dao->listar();

    $response = $response->withJSON($pessoa);    
    return $response;
});
$app->get('/api/pessoa/{id}', function (Request $request, Response $response, $args) {
    $id = $args["id"];
    $response->getBody()->write("Listar pessoa Id");
    $dao= new PessoaDAO; 
    $pessoa = $dao->buscarPorId($id);
    $response = $response->withJSON($pessoa); 
    return $response;
});

$app->post('/api/pessoa', function(Request $request, Response $response, $args){
  $response->getBody()->write("Insere pessoa");
  $data = $request->getParsedBody();
  //var_dump($data);
  $nomePessoa = $data['nomePessoa'];
  $cpf        = $data['cpf'];
  $cidade     = $data['cidade'];  
  $tipo       = $data['tipo'];

    $dao= new PessoaDAO;    
    $pessoa = new Pessoa(0, $nomePessoa, $cpf, $cidade, $tipo);

    $pessoa = $dao->inserir($pessoa);
    $response = $response->withStatus(201);
    $response = $response->withJSON($pessoa);
  return $response;
});

$app->put('/api/pessoa/{id}', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Atualiza pessoa");
    $data = $request->getParsedBody();
  
    $id         = $args['id'];
    $nomePessoa = $data['nomePessoa'];
    $cpf        = $data['cpf'];
    $cidade     = $data['cidade'];  
    $tipo       = $data['tipo'];

    $dao= new PessoaDAO; 
    $pessoa = new Pessoa($id, $nomePessoa, $cpf, $cidade, $tipo);

    $dao->atualizar($pessoa);
    $pessoa = $dao->buscarPorId($id);

    $response = $response->withJSON($pessoa);     
    return $response;
});


$app->delete('/api/pessoa/{id}', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Deleta pessoa\n");
  $data = $request->getParsedBody();  
  $id   = $args['id'];

  $dao= new PessoaDAO;   
  $success = $dao->deletar($id);
  if (!$success){
   // $response = $response->withStatus(204);
    $response->getBody()->write("registro não encontrado");
  }
  else {
    $response->getBody()->write("pessoa id: ". $id);
    
  }
  return $response;
});







$app->run();