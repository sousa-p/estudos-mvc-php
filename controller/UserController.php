<?php

namespace App\Controllers;

require './controller/checkFields.php';
class UserController
{
  public function __construct($data, $model, $service)
  {
    foreach ($data as $key => $value) {
      $this->$key = $value;
    }
    $this->model = $model;
    $this->service = $service;
  }

  public function login()
  {
    if (empty($this->EMAIL) || empty($this->SENHA)) {
      host_return('error', 'campo vazio');
    }

    $dados_user = [
      "ID" => $this->ID,
      "EMAIL" => $this->EMAIL,
      "SENHA" => $this->SENHA
    ];

    foreach ($dados_user as $key => $value) {
      $this->model->__set($key, "$value");
    }

    if ($this->EMAIL != null && $this->service->get_email()->count == 0) {
      host_return('error', 'Email não cadastrado');
    }

    $response = $this->service->checar_credenciais_login();
    echo json_encode($response);
  }
}
