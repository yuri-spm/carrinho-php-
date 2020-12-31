<?php

namespace Source\Products;

class Card {
    
    public $produtos;


    public function formatPrice($price){
        return number_format($price, 2, ",", ".");
    }


    public function addProduct(Product $produto){
                $this->produtos[] = $produto;
    }

    
    public function sum(){
        $total= 0;

        foreach($this->produtos as $value){
            $total +=$value->price * $value->amount;

        }

        return $this->formatPrice($total);
        
    }

    public function display(){

        foreach($this->produtos as $produto){
            echo "Produto: " . $produto->name . '</br>';
            echo "Preço: " . $this->formatPrice($produto->price) . '</br>';
            echo "Quantidade: " . $produto->amount . '</br><hr/>';
            

        }

    }


        
        
}