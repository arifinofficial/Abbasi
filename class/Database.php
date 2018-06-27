<?php

class Database
{
    private static $INSTANCE = null;
    private $conn;
    private $HOST    = 'localhost';
    private $USER    = 'root';
    private $PASS    = '';
    private $DB_NAME = 'db_abbasi';
    
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->HOST;dbname=$this->DB_NAME", $this->USER, $this->PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new Database;
        }
        return self::$INSTANCE;
    }

    public function insert($table, $fields = array())
    {
        $link = $this->conn;
        
        $column = implode(", ", array_keys($fields));
        $arrayValues = array();
        $i = 0;
        foreach ($fields as $key => $value) {
            $arrayValues[$i] = "?";
            $i++;
        }
        $values = implode(", ", $arrayValues);

        $query = "INSERT INTO $table ($column) VALUES ($values)";
        $statement = $link->prepare($query);
        $j = 1;
        foreach ($fields as $keys => $val) {
            if (is_int($val)) {
                $statement->bindValue($j, $val, PDO::PARAM_INT);
            } else {
                $statement->bindValue($j, "$val", PDO::PARAM_STR);
            }
            $j++;
        }
       
        $statement->execute();
    }
}
