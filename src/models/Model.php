<?php

class Model
{
    // definindo o mapeamento do model com o banco de dados 
    // aqui sera definido e no users os valores serão especificados
    protected static $nome_tabela = '';
    protected static $colunas = [];
    protected $values = [];
    function __construct($arr)
    {
        $this->carregarDeArray($arr);
    }


    public function carregarDeArray($arr)
    {
        if ($arr) {
            // apartir de chave e de valor que esta sendo percorrido os valores serão passado para  values
            foreach ($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key)
    {
        error_reporting(E_ALL ^ E_NOTICE);
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

  

    // essa função vai retornar um select de um determinado modelo
    public static function getResultSetFromSelect($where = [], $colunas = '*') {
        $sql = "SELECT ${colunas} FROM "
            . static::$nome_tabela
            . static::getFilters($where);
        $resultado = Database::getResultFromQuery($sql);
        if($resultado->num_rows==0){
            return null;
        } else {
            return $resultado;
        }
    }

    public static  function getOne($where=[],$colunas='*'){
        $class=get_called_class();
        $resultado=static::getResultSetFromSelect($where,$colunas); 
        return $resultado ? new $class($resultado->fetch_assoc()):null;
    }

    public static  function getAll($where=[],$colunas='*'){
        $objects=[];
        $resultado=static::getResultSetFromSelect($where,$colunas); 

        // se não tiver nenhum objetto ele retorna o  array vaziu e se tiver ele retorna todos os objetos criados
        if($resultado){
            // o metodo get_called_class vai dizer exatamente qual metodo chamou a função getAll
            $class=get_called_class();
            while($row=$resultado->fetch_assoc()){
                array_push($objects,new $class($row));
            }   
        }
        return $objects;
    }


    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }

    public function insert(){
        $sql = "INSERT INTO " . static::$nome_tabela . " ("
            . implode(",", static:: $colunas) . ") VALUES (";
        foreach(static:: $colunas as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }
     
    public function update(){
        $sql = "UPDATE " . static::$nome_tabela . " SET ";
        foreach(static::$colunas as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ' ';
        $sql .= "WHERE id = {$this->id}";
        Database::executeSQL($sql);
    }
    private static function getFilters($where) {
        $sql = '';
        if(count($where) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($where as $column => $value) {
                if($column == 'raw') {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);
                }
            }
        } 
        return $sql;
    }
}
