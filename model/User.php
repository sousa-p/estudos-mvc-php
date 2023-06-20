<?php
  namespace App\Models\User;
  use System\Database\Connect;
  use \PDO;

  class User {
    private $conn;

    private function __construct() {
      $this->conn = Connect::getInstance();
    }

    public function save($nome, $senha, $email) {
      $insert = 'INSERT INTO USER VALUES(0, :nome, :senha, :email)';
      $stmt = $this->conn->prepare($insert);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':senha', $senha);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
    }

    public function delete($id) {
      $delete = 'DELETE FROM USER WHERE ID = :id';
      $stmt = $this->conn->prepare($delete);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    }

    public function get_all () {
      $select = 'SELECT * FROM USER';
      $stmt = $this->conn->query($select);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get ($id) {
      $select = 'SELECT * FROM USER WHERE ID = :id';
      $stmt = $this->conn->prepare($select);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }
  }
?>