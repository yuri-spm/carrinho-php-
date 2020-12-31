<?php



namespace Source\Models;
use Source\Core\Connect;

use Source\Core\Session;
use Source\Products\Card;
use Source\Products\Product;

require __DIR__ ."/../autoload.php";

$carrinho = new Session();




    $produto = $carrinho->set($_POST['id'], 1);
  
    var_dump(
      $produto->all(),
    );







?>

