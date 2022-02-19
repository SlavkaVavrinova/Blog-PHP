<?php

class Connection
{
  private const DBNAME = 'phpkurz';
  private const HOST = 'localhost';
  private const USERNAME = 'phpkurz';
  private const PASSWORD = 'phpkurz';
  private const DBNAME_PRODUCTION = 'id18088243_kurzphp';
  private const HOST_PRODUCTION = 'localhost';
  private const USERNAME_PRODUCTION = 'id18088243_slavka';
  private const PASSWORD_PRODUCTION = 'Mojeheslo123?';
  private PDO $pdo;

  public function __construct()
  {
    $dsn = 'mysql:dbname=' . (str_contains($_SERVER['HTTP_HOST'], 'localhost') ? self::DBNAME : self::DBNAME_PRODUCTION) . ';host=' . (str_contains($_SERVER['HTTP_HOST'], 'localhost') ? self::HOST : self::HOST_PRODUCTION) . ';charset=utf8mb4';

    try {
      $this->pdo = new PDO($dsn, str_contains($_SERVER['HTTP_HOST'], 'localhost') ? self::USERNAME : self::USERNAME_PRODUCTION, str_contains($_SERVER['HTTP_HOST'], 'localhost') ? self::PASSWORD : self::PASSWORD_PRODUCTION);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('Connection failed: ' . $e->getMessage());
    }
  }

  public function getPdo(): PDO
  {
    return $this->pdo;
  }
}