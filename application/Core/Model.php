<?php

namespace Mini\Core;

use PDO;

class Model
{

    public $db = null;
    protected $table = null;

    function __construct()
    {
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    public function getAll($data=null)
    {
        if(is_array($data) && !is_null($data)){
            $_row = '';
            $_value = [];
            foreach ($data as $row=>$value){
                $_row.= $row.' = '.' :'.$row.' AND ';
                $_value[':'.$row] = $value;
            }
            $_row = substr($_row, 0, -5);
            $sql = "SELECT * FROM $this->table WHERE $_row";
            $query = $this->db->prepare($sql);
            $parameters = $_value;
        }else{
            $sql = "SELECT * FROM $this->table";
            $query = $this->db->prepare($sql);
            $parameters=array();
        }

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...

        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function getOne($id)
    {
        if(is_array($id) && !is_null($id)){
            $_row = '';
            $_value = [];
            foreach ($id as $row=>$value){
                $_row.= $row.' = '.' :'.$row.' AND ';
                $_value[':'.$row] = $value;
            }
            $_row = substr($_row, 0, -5);
            $sql = "SELECT * FROM $this->table WHERE $_row LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = $_value;
        }else{
            $sql = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
            $query = $this->db->prepare($sql);
            $parameters = array(':id' => $id);
        }
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    public function add($data = array())
    {
        $_row = '';
        $_params = '';
        $_value = [];
        if(is_array($data) && !is_null($data)){
            $_row = '(';
            $_params = '(';

            foreach ($data as $row=>$value){
                $_row.= $row.',';
                $_params.= ':'.$row.',';
                $_value[':'.$row] = $value;
            }
            $_row = substr($_row, 0, -1).')';
            $_params = substr($_params, 0, -1).')';
        }

        $sql = "INSERT INTO $this->table $_row VALUES $_params";
        $query = $this->db->prepare($sql);
        $parameters = $_value;

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function update($data = array(), $id)
    {
        $_row = '';
        $_value = [];
        if(is_array($data) && !is_null($data)){
            foreach ($data as $row=>$value){
                $_row.= $row.' = '.' :'.$row.',';
                $_value[':'.$row] = $value;
            }
            $_row = substr($_row, 0, -1);
        }

        $sql = "UPDATE $this->table SET $_row WHERE id = $id";

        $query = $this->db->prepare($sql);
        $parameters = $_value;

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
}
