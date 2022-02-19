<?php

class Message
{
  private ?int $id;

  private string $name;

  private string $email;

  private string $text;

  public function __construct(string $name, string $email, string $text, ?int $id = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->text = $text;
  }


  public function getId(): int|null
  {
    return $this->id;
  }

  public function setId(int|null $id): void
  {
    $this->id = $id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getText(): string
  {
    return $this->text;
  }

  public function setText(string $text): void
  {
    $this->text = $text;
  }
}