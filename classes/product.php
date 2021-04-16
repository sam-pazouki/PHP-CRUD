<?php


class Product {
    
    // Insert
    public function insert($name, $date){
      try{
        $stmt = $this->conn->prepare("INSERT INTO crud_products (name, date) VALUES(:name, :date)");
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":date", $date);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update
    public function update($name, $date, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE crud_products SET name = :name, date = :date WHERE id = :id");
          $stmt->bindparam(":name", $name);
          $stmt->bindparam(":date", $date);
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
        $stmt = $this->conn->prepare("DELETE FROM crud_products WHERE id = :id");
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
<?php
$servername="localhost";
$username="Sam";
$password="dream1992";
$db="productcrud";

// connect to database
$conn = mysqli_connect($servername, $username, $password, $db);

//check connection
if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}
?>