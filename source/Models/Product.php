<?php


namespace Source\Models;
use Source\Core\Model;

class Product extends Model
{
    public static $safe = ["product_id"];

    protected static $entity = "product";





    public function  bootstrap($name, $price, $description )
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;

        return $this;
        
    }

    /**
     * @param int $id
     * @param string $columns
     * @return mixed|null
     */
    public function loadProdutos(int $product_id, string $columns ="*")
    {

        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE product_id = :product_id", "product_id={$product_id}" );

        if($this->fail() || !$load->rowCount()){
            $this->message = "Produto não encontrado";
            return null;
        }

        return $load->fetchObject(__CLASS__);

    }

    public function find($name, $columns = "*")
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE name = :name", "name={$name}");
        if($this->fail() || !$find->rowCount())
        {
            $this->message = "Nome de produto não encontrado";
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

        if(!$this->required()){
            return null;
        }

        /**Product Update */

    if(!empty($this->product_id))
    {
                $produtoId = $this->product_id;
                $name = $this->read("SELECT product_id FROM product WHERE name = :name AND product_id != :product_id", "name={$this->name}&product_id={$produtoId}");
            if($name->rowCount())
            {
                $this->message = "O produto informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "product_id = :product_id", "product_id={$produtoId}");
            if($this->fail())
            {
                $this->message = "Erro ao atualizar, verifique os dados";
            }
            $this->message = "Dados atualizados com sucesso";
    }

        /**Product Create */
    
    if(empty($this->product_id))
    {
        if($this->find($this->name))
        {
            $this->message = "O produto informado já foi cadastrado";
            return null;

        }

        $produtoId = $this->create(self::$entity, $this->safe());
        if($this->fail()){
            $this->message = "Erro ao cadastrar, verifique os dados";
        }
        $this->message = "Cadastro realizado com sucesso";
    }
    $this->data = $this->read("SELECT * FROM  product WHERE product_id = :product_id", "product_id={$produtoId}")->fetch();
    return $this;
    }

    public function destroy()
    {
        if(!empty($this->product_id))
        {
            $this->delete(self::$entity, "product_id = :product_id", "product_id={$this->product_id}");
        }
        if($this->fail())
        {
            $this->message = "Não possivel remover o produto";
            return null;
        }
        $this->message = "Produto removido com sucesso";
        $this->data = null;
        return $this;

    }

    public function required()
    {

        if(empty($this->name) || empty($this->price) ){
            $this->message = "Erro ao cadastrar o produto";
        }
        return true;

    }



}
