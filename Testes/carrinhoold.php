<?php

    //require_once "teste.php";
    session_start();
    /**
     * Adicionar ao carrinho
     */
    if(!isset($_SESSION['itens'])){
        
        $_SESSION['itens'] = array();
    }

    if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
        
        $idProduto = $_GET['id'];
        if(!isset($_SESSION['itens'][$idProduto])){
           
            $_SESSION['itens'][$idProduto] =1;
        }else{
            $_SESSION['itens'][$idProduto] += 1;
        }

    }
/**
 * Exibe o carrinho
 */
    if(count($_SESSION['itens'])==0){
        echo 'Carrinho Vazio<br><a href="teste.php">Adicionar itens</a>';
    }else{
        $connect = new PDO('mysql:host=localhost;dbname=meusprodutos',"phpmyadmin","7q5eb6eb@#");

       foreach ($_SESSION['itens'] as $idProduto => $quantidade){
       
        $select = $connect->prepare("SELECT * FROM produtos WHERE id=? ");
        $select->bindParam(1, $idProduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $total = $quantidade * $produtos[0]["price"];

        echo 'Nome: '.$produtos[0]["name"].'</br>';
        echo'Preço: ' .number_format($produtos[0]["price"],2,",",".").'</br>';
        echo 'Quantidade: ' .$quantidade. '</br>';
        echo 'Total: '. number_format($total, 2, ",", "." ).'</br>
        <a href="remover.php?remover=carrinho&id='. $idProduto.'">Remover</a><hr/>'; 


    
    }
}