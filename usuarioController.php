<?php

include_once('usuario.php');
include_once('usuarioDAO.php');
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Firebase\JWT\JWT;
use use Slim\Psr7\Response;

///inicio usuario

class UsuarioController {

      public function listarUsuario(Request $request, Response $response, $args) {
      
          $dao= new UsuarioDAO;   
          $usuario = $dao->listar();

          $response = $response->withJSON($usuario);    
          return $response;
      }
      //listarUsuario buscarId
      public function buscarId(Request $request, Response $response, $args) {
          $id = $args["id"];
          
          $dao= new UsuarioDAO; 
          $usuario = $dao->buscarPorId($id);
          
          $response = $response->withJSON($usuario); 
          return $response;
      }

      public function inserirUsuario(Request $request, Response $response, $args){
        
        $data = $request->getParsedBody();
        
        $nomeUsuario = $data['nomeUsuario'];
        $login        = $data['login'];
        $senha     =  md5($data['senha']);
        $tipo       = $data['tipo'];

          
          $usuario = new Usuario(0, $nomeUsuario, $login, $senha, $tipo);
          $dao= new UsuarioDAO;
          $usuario = $dao->inserir($usuario);          
              

          $response = $response->withJSON($usuario,201);
          return $response;
      }

      public function atualizarUsuario(Request $request, Response $response, $args) {
          
          $data = $request->getParsedBody();
        
          $id           = $args['id'];
          $nomeUsuario  = $data['nomeUsuario'];
          $login        = $data['login'];
          $senha        = md5($data['senha']);  
          $tipo         = $data['tipo'];

          
          $usuario = new Usuario($id, $nomeUsuario, $login, $senha, $tipo);

          $dao= new UsuarioDAO; 
          $dao->atualizar($usuario);
          $usuario = $dao->buscarPorId($id);

          $response = $response->withJSON($usuario);     
          return $response;
      }


      public function deletarUsuario(Request $request, Response $response, $args) {
        
        $id   = $args['id'];
        
        $dao= new UsuarioDAO;   
        $success = $dao->deletar($id);
        if (!$success){
        // $response = $response->withStatus(204);
          $response->getBody()->write("registro não encontrado");
        }
        else {
          $response->getBody()->write("usuario deletada");
        }
        return $response;
      }

      public function autenticar(Request $request, Response $response, $args) {
        
        $data = $request->getParsedBody();
        $login  = $data['login'];
        $senha  = md5($data['senha']);

        $dao= new UsuarioDAO; 
        $usuario = $dao->buscarUsuario($login,$senha);
        
        $response = $response->withJSON($usuario); 
        return $response;
    }


}//fecha class