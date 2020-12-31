<?php

namespace Source\Models;
use Source\Core\Model;

class CardProduct extends Model
{
    public static $safe = ["date"];
    protected static $entity = "card_product";


    public function bootstrap($card_id, $product_id, $unit_price, $amount)
    {
        $this->card_id = $card_id;
        $this->product_id = $product_id;
        $this->unit_price = $unit_price;
        $this->amount = $amount;
       

        return $this;
    }

    public function find($card_id, $columns = "*")
    {

        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE card_id = :card_id", "card_id={$card_id}" );

        if($this->fail() || !$load->rowCount())
        {
            $this->message = "Carrinho não encontrado";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " .self::$entity. " LIMIT :l OFFSET :o", "l={$limit}&o={$offset}");
            if($this->fail() || !$all->rowCount() ){
                $this->message = "Sua consulta não retornou produtos";
                $this->null;
            }
            return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);

    }
    public function save()
    {
        if(!$this->required())
        {
            return null;
        }
              
        $cardProduto = $this->create(self::$entity, $this->safe());           
        if($this->fail())
        {
            $this->message = "Erro ao cadastrar itens ao pedido";
        }
            $this->message = "Item inserido com sucesso.";
        
        $this->resp = $this->read("SELECT * FROM card_product WHERE card_id = :card_id", "card_id={$cardProduto}")->fetch();
        return $this;

    }

    public function required()
    {

        if(empty($this->card_id) || empty($this->product_id) ){
            $this->message = "Erro ao cadastrar o produto";
        }
        return true;

    }

}