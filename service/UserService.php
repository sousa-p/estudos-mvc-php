<?php
  namespace App\Services;
  use PDO;
  class UserService {
    private $conn;
    private $model;

    public function __construct($conn, $model) {
      $this->conn = $conn;
      $this->model = $model;
    }

    public function save() {
      $insert = 'INSERT INTO USER VALUES(0, :NOME, :senha, :email)';
      $stmt = $this->conn->prepare($insert);
      $stmt->bindValue(':NOME', $this->model->NOME);
      $stmt->bindValue(':SENHA', $this->model->SENHA);
      $stmt->bindValue(':EMAIL', $this->model->EMAIL);
      $stmt->execute();
    }

    public function delete() {
      $delete = 'DELETE FROM USER WHERE ID = :ID';
      $stmt = $this->conn->prepare($delete);
      $stmt->bindValue(':ID', (int)$this->model->ID);
      $stmt->execute();
    }

    public function get_email() {
      $select = 'SELECT COUNT(*) as count FROM USER WHERE EMAIL = :EMAIL';
      $stmt = $this->conn->prepare($select);
      $stmt->bindValue(':EMAIL', $this->model->__get('EMAIL'));
      $stmt->execute();
      return $stmt->fetch();
    }

    public function get_senha () {
      $select = 'SELECT SENHA FROM USER WHERE ID = :ID';
      $stmt = $this->conn->prepare($select);
      $stmt->bindValue(':ID', (int)$this->model->ID);
      $stmt->execute();
      return $stmt->fetch()->SENHA;
    }

    public function checar_credenciais_login () {
      if (password_verify($this->model->__get('SENHA'), $this->get_senha())) {
        return [
          'type' => 'success',
          'msg' => 'Login efetuado com sucesso'
        ];
      }
      return [
        'type' => 'error',
        'msg' => 'Credenciais erradas'
      ];
    }
  }
