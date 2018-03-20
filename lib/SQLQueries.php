<?php
class  SQLQueries {
    
protected $servername = "localhost";
protected $username = "root";
protected $password = "1Qazqwer97";
protected $dbname = "mydb";


public function SelectFrom($columns, $table , $where = NULL)
{
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

    if (NULL===$where) {
        $sql = ("SELECT ".$columns." FROM ".$table.";");
        //print_r($sql);
        //echo '<br/>';

    } else {
        $sql = ("SELECT ".$columns." FROM ".$table." WHERE ".$where.";");
        //print_r($sql);
        //echo '<br/>';
    }
    
    return $conn->query($sql);
}

public function InsertInto($table, $columns, $values)
{
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $sql = ("INSERT INTO ".$table. "(".$columns.") VALUES (".$values.");");
    //print_r($sql);
    //echo '<br/>';
    
    return $conn->query($sql);
}

public function DeleteFrom($table, $columns, $values)
{
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $sql = ("INSERT INTO ".$table. "(".$columns.") VALUES (".$values.");");
    //print_r($sql);
    //echo '<br/>';
    
    return $conn->query($sql);
}


}