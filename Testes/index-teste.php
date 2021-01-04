<?php

namespace Source\Models;
use Source\Core\Connect;

use Source\Models\Card;
use Source\Models\Product;
use Source\Models\Products;



require __DIR__ ."/source/autoload.php";

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
    var_dump($modelCard->find($date));

}


