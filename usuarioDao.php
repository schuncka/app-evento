<?php
    include_once 'usuario.php';
	include_once 'PDOFactory.php';

    class UsuarioDAO
    {
        public function inserir(Usuario $usuario)
        {
            
            $qInserir = "INSERT INTO usuario( nome, login, senha, tipo) VALUES ( :nome, :login, :senha, :tipo)";
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);

            $comando->bindParam(":nome"  ,$usuario->nome);
            $comando->bindParam(":login" ,$usuario->login);
            $comando->bindParam(":senha" ,$usuario->senha);
            $comando->bindParam(":tipo"  ,$usuario->tipo);
            $comando->execute();
            $usuario->id = $pdo->lastInsertId();
            return $usuario;
        }

        public function deletar($id)
        {
            $qDeletar = "DELETE from usuario WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
            $success = $comando ->rowCount();
           // print("success: ".$success);
            return $success;
        }

        public function atualizar(Usuario $usuario)
        {
            //var_dump($palestra);
            
            $qAtualizar = "UPDATE usuario SET nome=:nome,login=:login,senha=:senha,tipo=:tipo  WHERE id= :id";     
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);

            $comando->bindParam(":id"    ,$usuario->id);
            $comando->bindParam(":nome"  ,$usuario->nome);
            $comando->bindParam(":login" ,$usuario->login);
            $comando->bindParam(":senha" ,$usuario->senha);
            $comando->bindParam(":tipo"  ,$usuario->tipo);
            
            $comando->execute(); 
        }

        public function listar()
        {
		    $query = 'SELECT * FROM usuario  ';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $usuario=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $usuario[] = new Usuario($row->id, $row->nome, $row->login, $row->senha, $row->tipo);
            }
           
            return $usuario;
        }

        public function buscarPorId($id)
        {
 		    $query = 'SELECT * FROM usuario WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam (':id', $id);
            $comando->execute();            
		    $row = $comando->fetch(PDO::FETCH_OBJ);
		    return new Usuario($row->id, $row->nome, $row->login, $row->senha, $row->tipo);
        }

        public function buscarPorLogin($login)
        {
 		    $query = 'SELECT * FROM usuario WHERE login=:login';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('login', $login);
		    $comando->execute();
            $row = $comando->fetch(PDO::FETCH_OBJ);
            $usuario = new Usuario($row->id, $row->nome, $row->login, $row->senha, $row->tipo);
		    return $usuario;           
        }


    }
?>