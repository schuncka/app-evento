<?php
use Slim\Factory\AppFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once('pessoaController.php');
include_once('palestraController.php');

require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();

$app->group('/api/pessoa', function($app){
    $app->get('', 'PessoaController:listarPessoa');
    $app->post('', 'PessoaController:inserirPessoa');

    $app->get('/{id}', 'PessoaController:buscarId');    
    $app->put('/{id}', 'PessoaController:atualizarPessoa');
    $app->delete('/{id}', 'PessoaController:deletarPessoa');
});


$app->group('/api/palestra', function($app){
  $app->get('',  'PalestraController:listarPalestra');
  $app->post('', 'PalestraController:inserirPalestra');

  $app->get('/{id}', 'PalestraController:buscarId');    
  $app->put('/{id}', 'PalestraController:atualizarPalestra');
  $app->delete('/{id}', 'PalestraController:deletarPalestra');
});

$app->run();
?>