<?php

include_once('pessoa.php');
include_once('pessoaDAO.php');
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

///inicio pessoa

class PessoaController {

      public function listarPessoa(Request $request, Response $response, $args) {
      
          $dao= new PessoaDAO;   
          $pessoa = $dao->listar();

          $response = $response->withJSON($pessoa);    
          return $response;
      }

      public function buscarId(Request $request, Response $response, $args) {
          $id = $args["id"];
          
          $dao= new PessoaDAO; 
          $pessoa = $dao->buscarPorId($id);
          
          $response = $response->withJSON($pessoa); 
          return $response;
      }

      public function inserirPessoa(Request $request, Response $response, $args){
        
        $data = $request->getParsedBody();
        
        $nomePessoa = $data['nomePessoa'];
        $cpf        = $data['cpf'];
        $cidade     = $data['cidade'];  
        $tipo       = $data['tipo'];

          
          $pessoa = new Pessoa(0, $nomePessoa, $cpf, $cidade, $tipo);
          $dao= new PessoaDAO;
          $pessoa = $dao->inserir($pessoa);          
              

          $response = $response->withJSON($pessoa,201);
          return $response;
      }

      public function atualizarPessoa(Request $request, Response $response, $args) {
          
          $data = $request->getParsedBody();
        
          $id         = $args['id'];
          $nomePessoa = $data['nomePessoa'];
          $cpf        = $data['cpf'];
          $cidade     = $data['cidade'];  
          $tipo       = $data['tipo'];

          
          $pessoa = new Pessoa($id, $nomePessoa, $cpf, $cidade, $tipo);
          
          $dao= new PessoaDAO; 
          $dao->atualizar($pessoa);
          $pessoa = $dao->buscarPorId($id);

          $response = $response->withJSON($pessoa);     
          return $response;
      }


      public function deletarPessoa(Request $request, Response $response, $args) {
       
        $data = $request->getParsedBody();  
        $id   = $args['id'];

        $dao= new PessoaDAO;   
        $success = $dao->deletar($id);
        if (!$success){
        // $response = $response->withStatus(204);
          $response->getBody()->write("registro não encontrado");
        }
        else {
          $response->getBody()->write("pessoa deletada");
        }
        return $response;
      }


}//fecha class