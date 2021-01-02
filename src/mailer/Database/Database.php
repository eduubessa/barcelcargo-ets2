<?php

namespace Database;

use PDO;
use PDOException;
use PHPMailer\PHPMailer\Exception;

class Database {

    protected $port = 3306;
    protected $host = "localhost";
    protected $username = "Admin";
    protected $password = "Vush@w123";
    protected $database = "barcelcargodev";
    protected $encode = "utf8mb4";

    private $connection = null;
    private $table = null;
    private $sql = null;

    private $fields = [];
    private $data;

    public function __construct()
    {
        try {

            if($this->connection == null)
            {
                $this->connection = new PDO("mysql:host=" . $this->host .";port=" . $this->port . ";dbname=" . $this->database . ";encode=" . $this->encode, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }else{
                throw new Exception("Failed connection, or connection not empty!");
            }

        }catch(PDOException $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param $table
     * @return $this
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function update($data)
    {
        try {

            $i = 0;

            if($this->table !== null)
            {
                $this->sql = "UPDATE `" . $this->table . "` SET ";

                foreach ($data as  $field => $value)
                {
                    $i++;
                    $this->sql .= "`" . $field .  "` = :" . $field;

                    if($i < count($data))
                    {
                        $this->sql .= ", ";
                    }

                    $this->fields = [];
                    $this->fields = array_merge($this->fields, array($field => $value));
                }

            }else{
                throw new \Exception("No table");
            }

            return $this;

        }catch(\Exception $exception){
            echo $exception->getMessage();
        }
    }

    /**
     * @param string $columns
     * @return $this
     */
    public function select($columns = "*")
    {
        try {
            if ($this->table == null) {
                throw new Exception("No table");
            }

            $this->sql = "SELECT " . $columns . " FROM `" . $this->table . "`";

            $this->fields = [];

            return $this;

        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function where($field, $value, $operator = "=")
    {
        try {
            if(strpos($this->sql, "WHERE") == true) {
                $this->sql .= " AND `" . $field . "` ";
            }else{
                $this->sql .= " WHERE `" . $field . "`";
            }

            if($operator == "=" or $operator == "LIKE")
            {
                if(is_numeric($value))
                {
                    $this->sql .= " = ";
                }else{
                    $this->sql .= " LIKE ";
                }
            }else if($operator == "!=" or $operator == "NOT LIKE"){
                if(is_numeric($value))
                {
                    $this->sql .= " != ";
                }else{
                    $this->sql .= " NOT LIKE ";
                }
            }

            $this->sql .= ":" . $field;

            $this->fields = array_merge($this->fields, array($field => $value));

            return $this;

        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function limit($number = 10)
    {
        $this->sql .= " LIMIT " . $number;

        return $this;
    }

    public function save()
    {
        $stmt = $this->connection->prepare($this->sql);

        $i = 0;

        if($this->fields != null)
        {
            foreach ($this->fields as $field => $value)
            {
                $i++;
                if(is_numeric($value)){
                    $stmt->bindValue(":" . $field, $value, PDO::PARAM_INT);
                }else{
                    $stmt->bindValue(":" . $field, $value, PDO::PARAM_STR);
                }
            }
        }

        $stmt->execute();
    }

    public function get()
    {
        $i = 0;

        $columnsName = [];

        $data = new \stdClass();

        try {

            $stmt = $this->connection->prepare("DESCRIBE `" . $this->table . "`");
            $stmt->execute();

            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

            foreach($columns as $column)
            {
                array_push($columnsName, $column);
            }

            $stmt = $this->connection->prepare($this->sql);

            if($this->fields !== null)
            {
                foreach ($this->fields as $field => $value)
                {
                    $i++;
                    if(is_numeric($value)){
                        $stmt->bindValue(':' . $field, $value, PDO::PARAM_INT);
                    }else{
                        $stmt->bindValue(':' . $field, $value, PDO::PARAM_STR);
                    }
                }
            }

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $x = 0;

            while($object = $stmt->fetch())
            {
                for($i = 0; $i < count($columnsName); $i++)
                {
                    $this->data[$x][$columnsName[$i]] = $object[$columnsName[$i]];
                }

                $x++;
            }

        }catch(Exception $exception){
            echo $exception->getMessage();
        }

        return (object) $this->data;
    }

    public function first()
    {
        try {

            if(strpos($this->sql, "SELECT"))
            {
                $this->sql .= " ORDER BY `id` ASC LIMIT 1";

                $stmt = $this->connection->prepare($this->sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_OBJ);

                while($object = $stmt->fetch())
                {
                    return $object;
                }
            }

        }catch(\Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function count()
    {
        try {

            $i = 0;

            $stmt = $this->connection->prepare($this->sql);

            if($this->fields !== null)
            {
                foreach ($this->fields as $field => $value)
                {
                    $i++;
                    if(is_numeric($value)){
                        $stmt->bindValue(':' . $field, $value, PDO::PARAM_INT);
                    }else{
                        $stmt->bindValue(':' . $field, $value, PDO::PARAM_STR);
                    }
                }
            }

            $stmt->execute();

            return $stmt->rowCount();

        }catch(Exception $exception){
            echo $exception->getMessage();
        }

        return (object) $this->data;
    }


    public function __destruct()
    {
        try {

            if($this->connection != null)
            {
               $this->connection = null;
            }
        }catch(Exception $exception){
            echo $exception-> getMessage();
        }
    }
}