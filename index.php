<?php


use Source\Models\Product;



require __DIR__ ."/source/autoload.php";

session_start();


$model = new Product();
$productItens = $model->all(30);


 
?>
<!Doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Super Rede - Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>Bem vindo ao Super Rede</h1><br/>
            <h3>Produtos</h3>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productItens as $productIten) : ?>
                <tr>
                    <td><?php echo $productIten->product_id;?></td>
                    <td><?php echo $productIten->name;?></td>
                    <td><?php echo number_format($productIten->price, 2 ,"," , ".");?></td>
                    <td><?php echo $productIten->description;?></td>
                    <td>
                        <form action="source/Products/InserCard.php" method="post">
                            <input name="id" type="hidden" value="<?php echo $productIten->product_id;?>"/>
                            <input name="name" type="hidden" value="<?php echo $productIten->name;?>"/>
                            <input name="price" type="hidden" value="<?php echo $productIten->price;?>"/>
                            <input name="amount" type="hidden" value="<?php echo $productIten->amount;?>"/>
                           <button type="submit"  class="btn btn-primary">Adicionar</button>

                    </td>
                          
                    <td>
                        </form>
                    </td>
                
                </tr>
                <?php endforeach?>   
            </tbody>
        </table>
    </div>

</body>
</html>