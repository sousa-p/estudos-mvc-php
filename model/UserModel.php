<?php
  namespace App\Models;

  class UserModel {
    private $ID;
    private $NOME;
    private $SENHA;
    private $EMAIL;

    public function __set($attr, $value) {
      $this->$attr = $value;
    }

    public function __get($attr) {
      return $this->$attr;
    }
  }
?>