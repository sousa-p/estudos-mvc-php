<?php
namespace System\Database;
use \PDOException;

final class Connect {
  const HOST = 'localhost';
  const DATABASE = 'USER_API';
  const USER = 'root';
  const PASSWORD = 'pedropedro2800';
  const CHARSET = 'utf8mb4';
  const OPTIONS = [
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
  ];
  public static $instance;
  public static function getInstance() {
    try {
      $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE . ";charset=" . self::CHARSET;
      self::$instance = new PDO($dsn, self::USER, self::PASSWORD, self::OPTIONS);
    } catch (PDOException $error) {
      die("Falha na conexão com o banco de dados: " . $error->getMessage());
    }
    return self::$instance;
  }
}
?>
