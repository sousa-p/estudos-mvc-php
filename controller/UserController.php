<?php
  namespace App\Controllers;
  use App\Models\UserModel;

  class UserController {
    public function __contruct ($data, $model, $service) {
      // Criar
    }

    public function create($nome, $senha, $email) {
      if (empty($nome) || empty($senha) || empty($email)) {
        echo json_encode(['error' => 'Dados vazios']);
        return False;
      } else if (UserModel::email_exists($email)) {
        echo json_encode(['error' => 'Email já registrado']);
        return False;
      }
    }

    public function delete($id) {
      if (empty($id)) {
        echo json_encode(['error' => 'Id vazio']);
        return false;
      }
      UserModel::delete($id);
      echo json_encode(['success' => true]);
    }

    public function get_all() {
      echo json_encode(UserModel::get_all());
    }

    public function get($id) {
      if (empty($id)) {
        echo json_encode(['error' => 'Id vazio']);
        return false;
      }
      echo json_encode(UserModel::get($id));
    }
  }
?>