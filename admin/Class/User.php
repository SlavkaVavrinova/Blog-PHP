<?php

class User
{
  private ?int $id;

  private string $email;

  private string $password;

  private string $name;

  private string $surname;

  public function __construct(string $email, string $name, string $surname, ?string $password = null, ?string $passwordHash = null, ?int $id = null)
  {
    $this->id = $id;
    $this->email = $email;
    $this->name = $name;
    $this->surname = $surname;
    if ($password) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    } elseif ($passwordHash) {
      $this->password = $passwordHash;
    }
  }


  public function getId(): int|null
  {
    return $this->id;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getPasswordHash(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): void
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);;
  }

  public function verifyPassword(string $password): bool
  {
    return password_verify($password, $this->getPasswordHash());
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getSurname(): string
  {
    return $this->surname;
  }

  public function setSurname(string $surname): void
  {
    $this->surname = $surname;
  }

  public function getFullName(): string
  {
    return $this->name . ' ' . $this->surname;
  }
}
