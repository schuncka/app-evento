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

      public function deletar($id)
        {
            $qDeletar = "DELETE from inscricao WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
            $success = $comando ->rowCount();
          
            return $success;
        }

        public function atualizar(Inscricao $inscricao)
        {
            //var_dump($palestra);
            $qAtualizar = "UPDATE inscricao SET id_palestra= :id_palestra, id_pessoa= :id_pessoa WHERE id= :id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);

            $comando->bindParam(":id"           ,$inscricao->id);
            $comando->bindParam(":id_palestra"  ,$inscricao->idPalestra);
            $comando->bindParam(":id_pessoa"    ,$inscricao->idPessoa);
            
            $comando->execute(); 
        }

        public function listar()
        {
		    $query = 'SELECT * FROM inscricao  ';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $produtos=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $palestra[] = new Inscricao($row->id,$row->id_palestra,$row->id_pessoa);
            }
           
            return $palestra;
        }

        public function buscarPorId($id)
        {
 		    $query = 'SELECT id, id_pessoa, id_palestra FROM inscricao WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $row = $comando->fetch(PDO::FETCH_OBJ);
		    return new Inscricao($row->id,$row->id_palestra,$row->id_pessoa);
        }
    }
?>