 <?php
//include_once("palestra.php");
//include_once("palestraDao.php");
//include_once("pessoa.php");
//include_once("pessoaDao.php");
include_once("inscricao.php");
include_once("inscricaoDao.php");

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class inscricaoController{


            //inicio inscricao
            public function listarInscricao(Request $request, Response $response, $args) { 
                $dao= new InscricaoDAO;   
                $palestra = $dao->listar();

                $response = $response->withJSON($palestra,200);    
                return $response;
            }

            public function buscarId(Request $request, Response $response, $args) {
               $id = $args["id"];
               // var_dump($request->getHeaders());
                $response->getBody()->write("Listar inscrição Id");
                
                $dao= new InscricaoDAO; 
                $inscricao = $dao->buscarPorId($id);
                
                $response = $response->withJSON($inscricao); 
                return $response;
            }


            public function inserirInscricao (Request $request, Response $response, $args){
                $response->getBody()->write("Insere Inscricao");
                $data = $request->getParsedBody();
                
               
                $idPalestra = $data['idPalestra'];
                $idPessoa  = $data['idPessoa'];
  
                
                $inscricao = new Inscricao(0, $idPalestra, $idPessoa);

                $dao= new InscricaoDAO; 
                $inscricao = $dao->inserir($inscricao);
                
                //$response = $response->withStatus(201);
                $response = $response->withJSON($inscricao,201);
                return $response;
            }
            

           public function atualizarInscricao(Request $request, Response $response, $args) {
                $response->getBody()->write("Atualiza Inscricao");
                $data = $request->getParsedBody();
            
                $id         = $args['id'];
                $idPalestra = $data['idPalestra'];
                $idPessoa   = $data['idPessoa'];

                $inscricao = new Inscricao($id, $idPalestra, $idPessoa);

                $dao= new InscricaoDAO; 
                $dao->atualizar($inscricao);
                $inscricao = $dao->buscarPorId($id);

                $response = $response->withJSON($inscricao);     
                return $response;
            }


            public function deletarInscricao(Request $request, Response $response, $args) {
            
            $data = $request->getParsedBody();  
            $id   = $args['id'];

            $dao= new InscricaoDAO;   
            $dao->deletar($id);
            $response->getBody()->write("palestra deletada id: ". $id);
                
            return $response;

            }
}///fim palestra controller

?>