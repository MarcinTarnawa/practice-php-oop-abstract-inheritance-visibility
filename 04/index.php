<?php

abstract class Model
{
    protected Database $db;
    protected string $dbName;
    protected array $fields;

    public function __construct($dbName = '', Database $db = Null)
    {
        $this->db = $db ? $db : $this->getDefaulDBConnection();
        if($dbName) $this->dbName = $dbName;
        $dbNameValidated = htmlspecialchars($dbName);
        $this->dbName = $dbNameValidated;
    }

    protected function getDefaulDBConnection()
    {
        $config = [
            'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'dbname' => 'db',
            'charset' => 'utf8mb4'
            ]
        ];
        return $this->db = new Database($config['database']);
    }

    public function get()
    {
        $result = $this->db->query("select * from {$this->dbName} where id = :id", [':id' => $this->id])->fetchAll();
        return $result;
    }

    public function remove()
    {
        $delete = $this->db->query("delete from {$this->dbName} where id = {$this->id}");
    }

    public function find($type, $find, $columns)
    {
        $findValidated = htmlspecialchars($find);
        $whereCondition = [];

        foreach ($columns as $column){
            $whereCondition[] = "`$column` LIKE '%$findValidated%'";
        }
        $whereClause = implode($type, $whereCondition);

        $sql = "SELECT * FROM $this->dbName WHERE " . $whereClause;
        $search = $this->db->query($sql)->fetchAll();
        return $search;
    }

    public function create()
    {
        $fields = $this->fields;
        $columnName = [];
        $params = [];
        foreach ($fields as $fieldName => $fieldValue) {
            $columnName[] = "$fieldName";
            $dataValue[] = ":$fieldName";
            $params[":$fieldName"] = $fieldValue;
        }
        $sql = "INSERT INTO $this->dbName (" . implode(', ', $columnName) . ") VALUES (" . implode(', ', $dataValue) . ")";
        $execute = $this->db->query($sql, $params);
        
    }

    public function update()
    {
        $fields = $this->fields;
        $dataValue = [];
        $params = [':id' => $this->id];

        foreach ($fields as $fieldName => $fieldValue) {
            $columnName[] = "$fieldName";
            $dataValue[] = "$fieldName = :$fieldName";
            $params[":$fieldName"] = $fieldValue;
        }

        $sql = "UPDATE $this->dbName SET " . implode(', ', $dataValue) . " WHERE id = :id";
        $execute = $this->db->query($sql, $params);
    }

    public function __get($name)
    {
        return $this->fields[$name];
    }

    public function __set($name, $value)
    {
        $this->fields[$name] = $value;
    }
}

class Room extends Model
{
    protected array $fields = ['id', 'number'];
}

class Teacher extends Model
{
    protected array $fields = ['id', 'firstName','lastName'];
}

require 'Database.php';

$dbName = "room";
$test = new Room($dbName);
$test->id = 2;
var_dump($test->get());

echo "<br>";

$dbName2 = 'teacher';
$test2 = new Teacher($dbName2);
var_dump($test2->find("OR", "Anna", ["firstName", "lastName"]));