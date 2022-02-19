<?php

class MessageRepository
{
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = (new Connection())->getPdo();
  }

  public function findMessageById(int $id): ?Message
  {
    $stmt = $this->pdo->prepare('SELECT * FROM message WHERE id = :id');

    $stmt->execute([':id' => $id]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($message) {
      return new Message($message['name'], $message['email'], $message['text'], $message['id']);
    }

    return null;
  }

  public function findMessages(): array
  {
    $stmt = $this->pdo->prepare('SELECT * FROM message');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $messages = [];
    foreach ($result as $message) {
      $messages[] = new Message($message['name'], $message['email'], $message['text'], $message['id']);
    }

    return $messages;
  }

  public function saveMessage(Message $message): Message
  {
    if (!$message->getId()) {
      $stmt = $this->pdo->prepare('INSERT INTO message (name, email, text) VALUES (:name, :email, :text)');
      $stmt->execute([
        ':name' => $message->getName(),
        ':email' => $message->getEmail(),
        ':text' => $message->getText(),
      ]);

      return $this->findMessageById($this->pdo->lastInsertId());
    } else {
      $stmt = $this->pdo->prepare('UPDATE message SET name = :name, email = :email, text = :text WHERE id = :id');
      $stmt->execute([
        ':name' => $message->getName(),
        ':email' => $message->getEmail(),
        ':text' => $message->getText(),
        ':id' => $message->getId(),
      ]);

      return $this->findMessageById($message->getId());
    }
  }
}