<?php

require_once 'database.php';

class User {
    private $conn;

    // Constructor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Execute queries SQL
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert
    public function insert($name,$price){
      try{
        $stmt = $this->conn->prepare("INSERT INTO crud_users (name,price) VALUES(:name,:price)");
        
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":price", $price);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    // Update
    public function update($id,$name, $price){
        try{
          $stmt = $this->conn->prepare("UPDATE crud_users SET name = :name, price = :price WHERE id=:id");
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":price", $price);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM crud_users WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>
