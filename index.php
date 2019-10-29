<?php
use Slim\Factory\AppFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;




include_once('pessoaController.php');
include_once('palestraController.php');
include_once('usuarioController.php');
include_once('inscricaoController.php');

require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();

$app->group('/api/pessoa', function($app){
    $app->get('', 'PessoaController:listarPessoa');
    $app->post('', 'PessoaController:inserirPessoa');

    $app->get('/{id}', 'PessoaController:buscarId');    
    $app->put('/{id}', 'PessoaController:atualizarPessoa');
    $app->delete('/{id}', 'PessoaController:deletarPessoa');
})->add('UsuarioController:validarToken');


$app->group('/api/palestra', function($app){
  $app->get('',  'PalestraController:listarPalestra');
  $app->post('', 'PalestraController:inserirPalestra');

  $app->get('/{id}', 'PalestraController:buscarId');    
  $app->put('/{id}', 'PalestraController:atualizarPalestra');
  $app->delete('/{id}', 'PalestraController:deletarPalestra');
})->add('UsuarioController:validarToken');

$app->group('/api/inscricao', function($app){
  $app->post('', 'inscricaoController:inserirInscricao');

});
//->add('UsuarioController:validarToken');
  // $app->get('',  'InscricaoController:listarInscricao');
 

 // $app->get('/{id}', 'InscricaoController:buscarInscricao');    
 // $app->put('/{id}', 'InscricaoController:atualizarInscricao');
  //$app->delete('/{id}', 'InscricaoController:deletarInscricao');



$app->group('/api/usuario', function($app){
  $app->get('',  'UsuarioController:listarUsuario');
  $app->post('', 'UsuarioController:inserirUsuario');

  $app->get('/{id}', 'UsuarioController:buscarId');    
  $app->put('/{id}', 'UsuarioController:atualizarUsuario');
  $app->delete('/{id}', 'UsuarioController:deletarUsuario');
});

$app->post('/api/auth','UsuarioController:autenticar');

$app->run();
?>