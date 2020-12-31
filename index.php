<?php

namespace Source\Models;
use Source\Core\Connect;

use Source\Models\Card;
use Source\Models\Product;



require __DIR__ ."/source/autoload.php";


$modelCard = new Card();
$modelCardProduct = new CardProduct();

$card = $modelCard->loadCard(3);

var_dump($card);

$produto = $modelCardProduct->find(3);
var_dump($card, $produto);
$total = $produto->amount * $produto->unit_price;
$card->total = $total;
$card->save();




echo "----------------OUTRO TESTE --------------------";

//$card = $modelCard->loadCard(9);
$card = $modelCard->find("2020-12-23 10:00:00");
echo "Card.</br>";
var_dump($card);



















