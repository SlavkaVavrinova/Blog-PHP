<?php

class UserRepository
{
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = (new Connection())->getPdo();
  }

  public function findUserById(int $id): ?User
  {
    $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');

    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      return new User($user['email'], $user['name'], $user['surname'], null, $user['password'], $user['id']);
    }

    return null;
  }

  public function findUserByEmail(string $email): ?User
  {
    $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');

    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      return new User($user['email'], $user['name'], $user['surname'], null, $user['password'], $user['id']);
    }

    return null;
  }

  public function findUsers(): array
  {
    $stmt = $this->pdo->prepare('SELECT * FROM user');

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $users = [];
    foreach ($result as $user) {
      $users[] = new User($user['email'], $user['name'], $user['surname'], null, $user['password'], $user['id']);
    }

    return $users;
  }

  public function saveUser(User $user): User
  {
    if (!$user->getId()) {
      $stmt = $this->pdo->prepare('INSERT INTO user (email, password, name, surname) VALUES (:email, :password, :name, :surname)');
      $stmt->execute([
        ':email' => $user->getEmail(),
        ':password' => $user->getPasswordHash(),
        ':name' => $user->getName(),
        ':surname' => $user->getSurname(),
      ]);

      return $this->findUserById($this->pdo->lastInsertId());
    } else {
      $stmt = $this->pdo->prepare('UPDATE user SET email = :email, password = :password, name = :name, surname = :surname WHERE id = :id');
      $stmt->execute([
        ':email' => $user->getEmail(),
        ':password' => $user->getPasswordHash(),
        ':name' => $user->getName(),
        ':surname' => $user->getSurname(),
        ':id' => $user->getId(),
      ]);

      return $this->findUserById($user->getId());
    }
  }

  public function deleteUser(User $user): int
  {
    $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id');
    $stmt->execute([':id' => $user->getId()]);

    return $user->getId();
  }
}
