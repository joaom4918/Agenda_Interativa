<?php
class Database{
    public static function getConnection(){
        $envPatch= realpath(dirname(__FILE__).'/../env.ini') ;      
        $env=parse_ini_file($envPatch);
        $conexao=new mysqli($env['host'],$env['username'],$env['senha'],$env['database']); 

        if($conexao->connect_error){
            die("ERRO:".$conexao->connect_error);
        }

        return $conexao;

    }

    // pegando o resultado apartir da consulta
    public static function getResultFromQuery($sql){
        $conexao=self::getConnection();
        $resultado=$conexao->query($sql);
        $conexao->close();
        return $resultado;

    }

    public static function executeSQL($sql){
        $conexao=self::getConnection();

        if(!mysqli_query($conexao,$sql)){
            throw new Exception(mysqli_error($conexao));
        }
        
        $id=$conexao->insert_id;
        $conexao->close();
        return $id;

    }


}