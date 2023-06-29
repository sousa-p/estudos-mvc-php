<?php
  namespace App\Services;
  
  class UserService {
    private $conn;
    private $model;

    public function __construct($conn, $model) {
      $this->conn = $conn;
      $this->model = $model;
    }

    public function save() {
      $insert = 'INSERT INTO USER VALUES(0, :nome, :senha, :email)';
      $stmt = $this->conn->prepare($insert);
      $stmt->bindValue(':nome', $this->model->nome);
      $stmt->bindValue(':senha', $this->model->senha);
      $stmt->bindValue(':email', $this->model->email);
      $stmt->execute();
    }

    public static function delete($id) {
      $delete = 'DELETE FROM USER WHERE ID = :id';
      $stmt = $this->conn->prepare($delete);
      $stmt->bindValue(':id', $this->model->id);
      $stmt->execute();
    }

    public static function get_all() {
      $select = 'SELECT * FROM USER';
      $stmt = $this->conn->query($select);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id) {
      $select = 'SELECT * FROM USER WHERE ID = :id';
      $stmt = $this->conn->prepare($select);
      $stmt->bindValue(':id', $this->model->id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function email_exists($email) {
      $select = 'SELECT * FROM USER WHERE EMAIL = :email';
      $stmt = $this->conn->prepare($select);
      $stmt->bindValue(':email', $this->model->email);
      $stmt->execute();
      return $stmt->rowCount() > 0;
    }
  }
?>
