<?php
namespace Source\Core;
include __DIR__. "/../Support/Config.php";


class Session{

public function __construct()
    {
        if(!session_id()){
            session_save_path(CONF_SES_PATH);
            session_start();
            
        }
    }

    public function __get($name)
    {
        if(!empty($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return null;
    }

    public function __isset($name): bool
    {
        $this->has[$name];
    }

  
    public function all(){
        return (object)$_SESSION;
    }


    public function set( $key, $value): Session
    {
        if(!isset($_SESSION['carrinho'][$key]) & !empty($_SESSION['carrinho'][$key]))
            $_SESSION['carrinho'][$key] = (is_array($value) ? (object)$value : $value);
        else{
            $_SESSION['carrinho'][$key] +=  $value;
        }

            return $this;
    }


    public function unset(string $key): Session 
    {

        unset($_SESSION['carrinho'][$key]);
        return $this;

    }

   
    public function has(string $key): bool 
    {
        return isset($_SESSION['carrinho'][$key]);

    }

    public function regenerate (): Session
    {
        session_regenerate_id(true);
        return $this;
    }


    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }


}