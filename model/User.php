<?php
  namespace App\Models;
  use System\Database\Connect;
  use \PDO;

  class UserModel {
    public static function save($nome, $senha, $email) {
      $insert = 'INSERT INTO USER VALUES(0, :nome, :senha, :email)';
      $stmt = Connect::getInstance()->prepare($insert);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':senha', $senha);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
    }

    public static function delete($id) {
      $delete = 'DELETE FROM USER WHERE ID = :id';
      $stmt = Connect::getInstance()->prepare($delete);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    }

    public static function get_all() {
      $select = 'SELECT * FROM USER';
      $stmt = Connect::getInstance()->query($select);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($id) {
      $select = 'SELECT * FROM USER WHERE ID = :id';
      $stmt = Connect::getInstance()->prepare($select);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function email_exists($email) {
      $select = 'SELECT * FROM USER WHERE EMAIL = :email';
      $stmt = Connect::getInstance()->prepare($select);
      $stmt->bindValue(':email', $email);
      $stmt->execute();
      return $stmt->rowCount() > 0;
    }
  }
?>
