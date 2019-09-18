<?php
    include_once 'pessoa.php';
	include_once 'PDOFactory.php';

    class PessoaDAO
    {
        public function inserir(Pessoa $pessoa)
        {
           
            $qInserir = "INSERT INTO pessoa(nome, cpf, cidade, tipo) VALUES (:nome_pessoa,:cpf,:cidade,:tipo)";
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);

            $comando->bindParam(":nome_pessoa",$pessoa->nome);
            $comando->bindParam(":cpf"        ,$pessoa->cpf);
            $comando->bindParam(":cidade"     ,$pessoa->cidade);
            $comando->bindParam(":tipo"       ,$pessoa->tipo);
            $comando->execute();
            $pessoa->id = $pdo->lastInsertId();
            return $pessoa;
        }

        public function deletar($id)
        {
            $qDeletar = "DELETE from pessoa WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
            $success = $comando ->rowCount();
           // print("success: ".$success);
            return $success;
        }

        public function atualizar(Pessoa $pessoa)
        {
            //var_dump($palestra);
            
            $qAtualizar = "UPDATE pessoa SET nome=:nome_pessoa,cpf=:cpf,cidade=:cidade,tipo=:tipo  WHERE id= :id";     
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);

            $comando->bindParam(":id"           ,$pessoa->id);
            $comando->bindParam(":nome_pessoa",$pessoa->nome);
            $comando->bindParam(":cpf"        ,$pessoa->cpf);
            $comando->bindParam(":cidade"     ,$pessoa->cidade);
            $comando->bindParam(":tipo"       ,$pessoa->tipo);
            
            $comando->execute(); 
        }

        public function listar()
        {
		    $query = 'SELECT * FROM pessoa  ';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $pessoa=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $pessoa[] = new Pessoa($row->id,$row->nome,$row->cpf,$row->cidade,$row->tipo);
            }
           
            return $pessoa;
        }

        public function buscarPorId($id)
        {
 		    $query = 'SELECT * FROM pessoa WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam (':id', $id);
            $comando->execute();            
		    $row = $comando->fetch(PDO::FETCH_OBJ);
		    return new Pessoa($row->id,$row->nome,$row->cpf,$row->cidade,$row->tipo);
        }
    }
?>