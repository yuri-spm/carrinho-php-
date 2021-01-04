<?php


namespace Source\Core;
use \Source\Core\Connect;


/**
 * Class Model
 * @package source\CRUD
 */
abstract class Model
{

    /**
     * @var object | null
     */
    protected $data;

    /**
     * @var \PDOException | null
     */
    protected $fail;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @return object|null
     */
    public function data(){
        return $this->data;
    }

    /**
     * @return \PDOException
     */

    public function fail()
    {
        return $this->fail;
    }

    /**
     * @return string|null
     */

    public function message()
    {
        return $this->message;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(empty($this->data)){
            $this->data =new \stdClass();
        }
        $this->data->$name = $value;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }


    protected function create(string $entity, array $data)
    {
        
  
        try{
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data)) ;
           
            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns})  VALUES ({$values})");
            $stmt->execute($this->filter($data));
            return Connect::getInstance()->lastInsertId();
        }catch (\PDOException $exception){
            $this->fail = $exception;
            return null;
        }
   
        

    }

    /**
     * @param string $select
     * @param string|null $params
     * @return bool|\PDOStatement|null
     */

    public function  read(string $select, string $params = null): ?\PDOStatement
    {
        try{
            $stmt = Connect::getInstance()->prepare($select);

            if($params){
                parse_str($params, $params);

                foreach($params as $key=>$value){
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }
            $stmt->execute();
            return $stmt;
        }catch (\PDOException $execption){
            $this->fail = $execption;
            return null;
        }

       
    }

    public function update(string $entity, array $data, string $terms, string $params)
    {
        //var_dump($entity, $data, $terms, $params);
        //exit;
        try{

            $dataSet = [];
            foreach($data as $bind => $value){
                $dataSet[] ="{$bind} = :{$bind}";
            }
            $dataSet = implode(", ", $dataSet);
            parse_str($params, $params);

        $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
        $stmt->execute($this->filter(array_merge($data, $params)));
        return ($stmt->rowCount()?? 1);


        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    public function delete(string $entity, string $terms, string $params)
    {
        try{
        $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
        parse_str($params, $params);
        $stmt->execute($params);
        return ($stmt->rowCount() ?? 1);        
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    public function safe()
    {
        
        
        $safe = (array) $this->data;
        foreach (static::$safe as $unset){
            unset($safe[$unset]);
        }
        return $safe;
    
    }

    public function  filter(array $data) : ?array
    {
        $filter = [];
        foreach ($data as $key => $value){
            /**DEBUG  var_dump($value); */
            $filter[$key] = (is_null($value)? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)); 
        }
        /* DEBUG var_dump( $filter); */
        return $filter;
    }
}
