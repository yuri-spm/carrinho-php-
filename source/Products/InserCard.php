<?php



namespace Source\Models;
use Source\Core\Connect;

use Source\Core\Session;
use Source\Model\Card;
use Source\Models\Product;

require __DIR__ ."/../autoload.php";

/**Iniciando a sessão carrinho */
$carrinho = new Session();

/**Atribuindo itens ao carrinho */
$produto = $carrinho->set($_POST['id'], 1);
var_dump(
  $produto->all(),
);


?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title> Super Rede - Card </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<head>
<body>
    <div class="container">
      <h3>Nº CARRINHO</h3>
    </div>
    <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Excluir</th>
      </tr>
      <tbody>
