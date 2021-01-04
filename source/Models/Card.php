<?php


namespace Source\Models;
use Source\Core\Model;

class Card extends Model
{
    public static $safe = ["card_id"];

    protected static $entity = "card";





    public function  bootstrap($card_date, $total)
    {
        $this->card_date = $card_date;
        $this->total = $total;
        
        return $this;
        
    }

    /**
     * @param int $id
     * @param string $columns
     * @return mixed|null
     */
    public function loadCard(int $card_id, string $columns ="*")
    {

        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE card_id = :card_id", "card_id={$card_id}" );

        if($this->fail() || !$load->rowCount()){
            $this->message = "Carrinho não encontrado";
            return null;
        }
       
        return $load->fetchObject(__CLASS__);

    }

    public function find($card_date, $columns = "*")
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE card_date = :card_date", "card_date={$card_date}");
        if($this->fail() || !$find->rowCount())
        {
            $this->message = "Data não encontrada";
            return null;
        }
        return $find->fetchObject(__CLASS__);
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

       /**Card Update */
       if(!empty($this->card_id))
       {
           $cardId = $this->card_id;
           $card_date = $this->read("SELECT card_id FROM  card  WHERE card_date = :card_date AND  card_id != :card_id", "card_date={$this->card_date}&card_id={$cardId}");
           if($card_date->rowCount())
           {
               $this->message = "O pedido não foi encontrado";
               return null;
           }

           $this->update(self::$entity, $this->safe(), "card_id = :card_id", "card_id={$cardId}");
           if($this->fail())
           {
               $this->message = "Erro ao atualizar o pedido, verifique os dados";
           }
           $this->message = "Pedido atualizado com sucesso.";


       }
       /**Card Create */

       if(empty($this->card_id))
       {
           if($this->find($this->card_date))
           {
                $this->message = "O pedido informado já foi cadastrado";
           }
           $cardId = $this->create(self::$entity, $this->safe());
           if($this->fail())
           {
                $this->message = "Erro ao cadastrar o pedido";
           }
           $this->message = "Pedido inserido com sucesso.";
       }
       $this->data = $this->read("SELECT * FROM card WHERE card_id = :card_id", "card_id={$cardId}")->fetch();
       return $this;
    }

    public function destroy()
    {

    }

    public function required()
    {

        if(empty($this->card_date) ){
            $this->message = "Erro ao cadastrar carrinho";
        }
        return true;

    }



}
