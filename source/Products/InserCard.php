<?php

use Source\Core\Session;
use Source\Models\Card;
use Source\Models\Product;

require __DIR__ ."/../autoload.php";


/**Iniciando a sessão carrinho */
$carrinho = new Session();

/**Atribuindo itens ao carrinho */
$produto = $carrinho->set($_POST['id'], 1);
var_dump(
  $produto->all(),
);

$date = date('Y-m-d');
var_dump($date);

$modelCard = new Card();
$total = 0;
$card = $modelCard->bootstrap($date, $total);
if(!$modelCard->find($card->card_date))
{
    echo "Cadastro";
    $card->save();
}else{
    echo "Lendo";
   

}
$card = $modelCard->find($date);

?>
<!Doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title> Super Rede - Card </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<head>
<body>

    <div class="container">
      <div>
        <h3><?= "Nº CUPOM ". $card->card_id;?></h3>
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
      <?php foreach($_SESSION["carrinho"] as $key=>$value) :?>
        <tr>
          <td><?=$key; ?></td>
          <td></td>
          <td></td>
          <td><?=$value;?></td>
          <td><button type="submit"  class="btn btn-primary">Excluir</button></td>
        </tr>
        <?php endforeach ?>
      </tdoby>
      </table>
    </div>

  </body>
</html>