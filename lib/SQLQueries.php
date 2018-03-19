<?php
class  SQLQueries {
    
protected $servername = "localhost";
protected $username = "root";
protected $password = "1Qazqwer97";
protected $dbname = "mydb";

static public function Exc($result)
{
    if (null!==$result) {
        return $result;
    } else {
        $message->setMessage('Error','$result is undefined');
    }
}

public function SelectFrom($columns, $table)
{
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $sql = ("SELECT ".$columns." FROM ".$table);
    $result = $conn->query($sql);
    return self::Exc($result);
}

public function InsertInto($table, $columns, $values)
{
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $sql = ("INSERT INTO ".$table. "(".$columns.") VALUES (".$values.");");
    print_r($sql);
    $result = $conn->query($sql);  
    return self::Exc($result);
}


}