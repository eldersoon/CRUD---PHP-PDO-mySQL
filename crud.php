<?php

class crud{
    private $host = "localhost";
    private $dbname = "pdodb";
    private $user = "root";
    private $pass = "";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo 'Error: '.$e->getMessage();
        }
    }

    public function insertData($table, $name, $email){
        $sql = "INSERT INTO $table SET name=:name, email=:email";
        $query = $this->conn->prepare($sql);
        $query->execute(array(':name'=>$name, ':email'=>$email));
        return true;
    }
    
    public function updateData($table, $name, $email, $id){
        $sql = "UPDATE $table SET name=:name, email=:email WHERE id=:id";
        $query = $this->conn->prepare($sql);
        $query->execute(array(':id'=>$id, ':name'=>$name, ':email'=>$email));
        return true;
    }

    public function deleteData($table, $id){
        $sql = "DELETE FROM $table WHERE id=:id";
        $query = $this->conn->prepare($sql);
        $query->execute(array(':id'=>$id));
        return true;
    }

    public function showData($table){
        $sql = "SELECT * FROM $table";
        $query = $this->conn->query($sql);
        
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            $data[] = $result;
        }

        if(empty($data)){
            return null;
        }else{
            return $data;
        }
    }

    public function getById($table, $id){
        $sql = "SELECT * FROM $table";
        $query = $this->conn->prepare($sql);
        $query->execute(array(':id'=>$id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


}

?>