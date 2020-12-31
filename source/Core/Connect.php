<?php


namespace Source\Core;
require __DIR__ ."/../Support/Config.php";
use \PDO;
use \PDOException;

class Connect
{
 
    private const OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static  $instance;

    public static  function  getInstance():PDO{
        if(empty(self::$instance)){
            try{
                self::$instance = new PDO(
                    "mysql:host=". CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::OPTION
                );
            }catch (PDOException $exception){
                die("<p class='alert alert-info'>Erro ao conectar</p>");
                var_dump($exception);
            }
        }
        return self::$instance;
    }

    final private function __construct()
    {
    }

    final private  function  __clone()
    {

    }


}