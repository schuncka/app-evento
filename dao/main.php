<?php
    include_once('Produto.php');
    include_once('ProdutoDAO.php');

    $produto = new Produto(0, "cama", 287.50);
    //$produto = new Produto(0, "sweet", 321);

			
    $dao= new ProdutoDAO;    
    $produto = $dao->inserir($produto);

   // $produto = $dao->buscarPorId(50);
   // print_r($produto);

   // $produto = new Produto(3, "cama solteiro", 227.50);
   // $dao->atualizar($produto);
   // $produto = $dao->buscarPorId(3);
   // print_r($produto);
  //  $dao->deletar(5);				


   // $produtos =  $dao->listar(1000);	
   // print_r($produtos);
?>