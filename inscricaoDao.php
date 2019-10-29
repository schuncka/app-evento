<?php
    include_once 'palestra.php';
    include_once 'pessoa.php';
    include_once 'inscricao.php';
    include_once 'PDOFactory.php';

    class InscricaoDAO
    {
        public function inserir(Inscricao $inscricao)
        {
            //var_dump($inscricao);
            $qInserir = "INSERT INTO inscricao(id_palestra,id_pessoa) VALUES (:idpalestra,:idpessoa)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);

            $comando->bindParam(":idpalestra"   ,$inscricao->idPalestra);
            $comando->bindParam(":idpessoa"   ,$inscricao->idPessoa);
            
            $comando->execute();
            $inscricao->id = $pdo->lastInsertId();
            return $inscricao;
        }

  /*      public function deletar($id)
        {
            $qDeletar = "DELETE from inscricao WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
            $success = $comando ->rowCount();
           // print("success: ".$success);
            return $success;
        }

       /* public function atualizar(Palestra $palestra)
        {
            //var_dump($palestra);
            $qAtualizar = "UPDATE palestra SET nome_palestra= :nome_palestra, palestrante= :palestrante, inicio= :inicio, fim= :fim WHERE id= :id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);

            $comando->bindParam(":id"           ,$palestra->id);
            $comando->bindParam(":nome_palestra",$palestra->nomePalestra);
            $comando->bindParam(":palestrante"  ,$palestra->palestrante);
            $comando->bindParam(":inicio"       ,$palestra->inicio);
            $comando->bindParam(":fim"          ,$palestra->fim);
            
            $comando->execute(); 
        }
*/
 /*       public function listar()
        {
		    $query = 'SELECT * FROM palestra  ';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $produtos=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $palestra[] = new Palestra($row->id,$row->nome_palestra,$row->palestrante,$row->inicio,$row->fim);
            }
           
            return $palestra;
        }

        public function buscarPorId($id)
        {
 		    $query = 'SELECT * FROM palestra WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $row = $comando->fetch(PDO::FETCH_OBJ);
		    return new Palestra($row->id,$row->nome_palestra,$row->palestrante,$row->inicio,$row->fim);
        }*/
    }
?>