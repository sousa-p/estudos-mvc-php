<?php

use System\Database\Connect;
use App\Controllers\UserController;
use App\Models\UserModel;
use App\Services\UserService;

require './database/Connect.php';
require './model/UserModel.php';
require './controller/UserController.php';
require './service/UserService.php';

// Dummy data
$request = [
  'action' => 'login',
  'ID' => 1,
  'EMAIL' => 'asd@asd',
  'SENHA' => 'asdasd'
];

$action = $request['action'];

$conn = Connect::get_instance();
$user_model = new UserModel;
$user_service = new UserService($conn, $user_model);
$user_controller = new UserController($request, $user_model, $user_service);
$user_controller->$action();
