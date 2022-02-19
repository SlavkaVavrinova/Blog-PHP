<?php

class BlogPost
{
  private ?int $id;

  private string $title;

  private string $subtitle;

  private string $text;

  private string $image;

  private string $author;

  private DateTime $createdAt;

  public function __construct(string $title, string $subtitle, string $text, string $image, string $author, DateTime $createdAt, ?int $id = null)
  {
    $this->id = $id;
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->text = $text;
    $this->image = $image;
    $this->author = $author;
    $this->createdAt = $createdAt;
  }


  public function getId(): int|null
  {
    return $this->id;
  }

  public function setId(int|null $id): void
  {
    $this->id = $id;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  public function getSubtitle(): string
  {
    return $this->subtitle;
  }

  public function setSubtitle(string $subtitle): void
  {
    $this->subtitle = $subtitle;
  }

  public function getText(): string
  {
    return $this->text;
  }

  public function setText(string $text): void
  {
    $this->text = $text;
  }

  public function getImage(): string
  {
    return $this->image;
  }

  public function setImage(string $image): void
  {
    $this->image = $image;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function setAuthor(string $author): void
  {
    $this->author = $author;
  }

  public function getCreatedAt(): DateTime
  {
    return $this->createdAt;
  }

  public function setCreatedAt(DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }
}