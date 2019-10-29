cd <?php
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
 /*           public function listarInscricao(Request $request, Response $response, $args) { 
                $dao= new PalestraDAO;   
                $palestra = $dao->listar();

                $response = $response->withJSON($palestra,201);    
                return $response;
            }

            public function buscarInscricao(Request $request, Response $response, $args) {
               $id = $args["id"];
               // var_dump($request->getHeaders());
                $response->getBody()->write("Listar palestra Id");
                
                $dao= new InscricaoDAO; 
                $palestra = $dao->buscarPorId($id);
                
                $response = $response->withJSON($palestra); 
                return $response;
            }

            public function inserirInscricao(Request $request, Response $response, $args){
                $response->getBody()->write("Insere palestra");
                $data = $request->getParsedBody();
                var_dump($data);
                $idPalestra = $data["idpalestra"];
                $idPessoa  =  $data['idpessoa'];
                print("palestra: " .$idPalestra);
                print("\r\n pessoa: ".$idPessoa);
         //      var_dump( new Inscricao(0, $idPalestra ,  $idPessoa));
               
                $inscricao = new Inscricao(0, $idPalestra ,  $idPessoa);
var_dump($inscricao);
                $dao= new InscricaoDAO; 
                $inscricao = $dao->inserir($inscricao);
                
                $response = $response->withStatus(201);
                $response = $response->withJSON($inscricao);
                return $response;
            }*/

            public function inserirInscricao (Request $request, Response $response, $args){
                $response->getBody()->write("Insere Inscricao");
                $data = $request->getParsedBody();
                
                $idPalestra = $data['idpalestra'];
                $idPessoa  = $data['idpessoa'];
           // print_r($inscricao);
                
                $inscricao = new Inscricao(0, $idPalestra, $idPessoa);
               // $inscricao = new Inscricao(0, 13, 13);
var_dump($inscricao);
                $dao= new InscricaoDAO; 
                $inscricao = $dao->inserir($inscricao);
                
                $response = $response->withStatus(201);
                $response = $response->withJSON($inscricao);
                return $response;
            }
            

/*            public function atualizarInscricao(Request $request, Response $response, $args) {
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

/*
            public function deletarInscricao(Request $request, Response $response, $args) {
            
            $data = $request->getParsedBody();  
            $id   = $args['id'];

            $dao= new PalestraDAO;   
            $dao->deletar($id);
            $response->getBody()->write("palestra deletada id: ". $id);
                
            return $response;

            }*/
}///fim palestra controller

?>