<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$key = "app-evento";
$token = array(
  "iss" => "http://exemple.org",
  "aud" => "http://exemple.com",
  "iat" => "1356999524",
  "nbf" => "1357000000" 
);


include_once('pessoaController.php');
include_once('palestraController.php');
include_once('usuarioController.php');

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


$app->group('/api/usuario', function($app){
  $app->get('',  'UsuarioController:listarUsuario');
  $app->post('', 'UsuarioController:inserirUsuario');

  $app->get('/{id}', 'UsuarioController:buscarId');    
  $app->put('/{id}', 'UsuarioController:atualizarUsuario');
  $app->delete('/{id}', 'UsuarioController:deletarUsuario');
});

$app->group('/api/auth', function($app){
  $app->post('',  'UsuarioController:buscarUsuario');
 // $app->post('', 'UsuarioController:inserirUsuario');

  //$app->get('/{id}', 'UsuarioController:buscarId');    
  //$app->put('/{id}', 'UsuarioController:atualizarUsuario');
  //$app->delete('/{id}', 'UsuarioController:deletarUsuario');
});

$app->run();
?>