<?php

include_once('usuario.php');
include_once('usuarioDAO.php');
use Psr\Http\Message\ResponseInterface as Responses;
use Psr\Http\Message\ServerRequestInterface as Request;

use Firebase\JWT\JWT;
use Slim\Psr7\Response;

///inicio usuario

class UsuarioController {
  private $secretKey = "app@evento";

      public function listarUsuario(Request $request, Responses $response, $args) {
      
          $dao= new UsuarioDAO;   
          $usuario = $dao->listar();

          $response = $response->withJSON($usuario);    
          return $response;
      }
      //listarUsuario buscarId
      public function buscarId(Request $request, Responses $response, $args) {
          $id = $args["id"];
          
          $dao= new UsuarioDAO; 
          $usuario = $dao->buscarPorId($id);
          
          $response = $response->withJSON($usuario); 
          return $response;
      }

      public function inserirUsuario(Request $request, Responses $response, $args){
        
        $data = $request->getParsedBody();
        
        $nomeUsuario = $data['nomeUsuario'];
        $login        = $data['login'];
        $senha     =  $data['senha'];
        $tipo       = $data['tipo'];

          
          $usuario = new Usuario(0, $nomeUsuario, $login, $senha, $tipo);
          $dao= new UsuarioDAO;
          $usuario = $dao->inserir($usuario);       
              

          $response = $response->withJSON($usuario,201);
          return $response;
      }

      public function atualizarUsuario(Request $request, Responses $response, $args) {
          
          $data = $request->getParsedBody();
        
          $id           = $args['id'];
          $nomeUsuario  = $data['nomeUsuario'];
          $login        = $data['login'];
          $senha        = $data['senha'];  
          $tipo         = $data['tipo'];

          
          $usuario = new Usuario($id, $nomeUsuario, $login, $senha, $tipo);

          $dao= new UsuarioDAO; 
          $dao->atualizar($usuario);
          $usuario = $dao->buscarPorId($id);

          $response = $response->withJSON($usuario);     
          return $response;
      }


      public function deletarUsuario(Request $request, Responses $response, $args) {
        
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

      public function autenticar($request, $response, $args)
        {
            $user = $request->getParsedBody();
            
            $dao= new UsuarioDAO;    
            $usuario = $dao->buscarPorLogin($user['login']);
            if($usuario->senha == $user['senha'])
            {
                $token = array(
                    'user' => strval($usuario->id),
                    'nome' => $usuario->nome
                );
                //var_dump($token);
                $jwt = JWT::encode($token, $this->secretKey);
                return $response->withJson(["token" => $jwt], 201)
                    ->withHeader('Content-type', 'application/json');   
            }
            else
                return $response->withStatus(401);
        }

        public function validarToken($request, $handler)
        {
            $response = new Response();
            $token = $request->getHeader('Authorization');
            
            if($token && $token[0])
            {
                try {
                    $decoded = JWT::decode($token[0], $this->secretKey, array('HS256'));

                    if($decoded){
                        $response = $handler->handle($request);
                        return($response);
                    }
                } catch(Exception $error) {

                    return $response->withStatus(401);
                }
            }
            
            return $response->withStatus(401);
        }


}//fecha class