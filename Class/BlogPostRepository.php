<?php

class BlogPostRepository
{
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = (new Connection())->getPdo();
  }

  public function findBlogPostById(int $id): ?BlogPost
  {
    $stmt = $this->pdo->prepare('SELECT * FROM blog_post WHERE id = :id');

    $stmt->execute([':id' => $id]);
    $blogPost = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($blogPost) {
      return new BlogPost($blogPost['title'], $blogPost['subtitle'], $blogPost['text'], $blogPost['image'], $blogPost['author'], new DateTime($blogPost['created_at']), $blogPost['id']);
    }

    return null;
  }

  public function findBlogPosts(?int $limit = null): array
  {
    if ($limit) {
      $stmt = $this->pdo->prepare('SELECT * FROM blog_post ORDER BY created_at DESC limit :limit');
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    } else {
      $stmt = $this->pdo->prepare('SELECT * FROM blog_post ORDER BY created_at DESC');
    }

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $blogPosts = [];
    foreach ($result as $blogPost) {
      $blogPosts[] = new BlogPost($blogPost['title'], $blogPost['subtitle'], $blogPost['text'], $blogPost['image'], $blogPost['author'], new DateTime($blogPost['created_at']), $blogPost['id']);
    }

    return $blogPosts;
  }

  public function saveBlogPost(BlogPost $blogPost): BlogPost
  {
    if (!$blogPost->getId()) {
      $stmt = $this->pdo->prepare('INSERT INTO blog_post (title, subtitle, text, image, author, created_at) VALUES (:title, :subtitle, :text, :image, :author, :created_at)');
      $stmt->execute([
        ':title' => $blogPost->getTitle(),
        ':subtitle' => $blogPost->getSubtitle(),
        ':text' => $blogPost->getText(),
        ':image' => $blogPost->getImage(),
        ':author' => $blogPost->getAuthor(),
        ':created_at' => $blogPost->getCreatedAt()->format('Y-m-d H:i:s'),
      ]);

      return $this->findBlogPostById($this->pdo->lastInsertId());
    } else {
      $stmt = $this->pdo->prepare('UPDATE blog_post SET title = :title, subtitle = :subtitle, text = :text, image = :image, author = :author, created_at = :created_at  WHERE id = :id');
      $stmt->execute([
        ':title' => $blogPost->getTitle(),
        ':subtitle' => $blogPost->getSubtitle(),
        ':text' => $blogPost->getText(),
        ':image' => $blogPost->getImage(),
        ':author' => $blogPost->getAuthor(),
        ':created_at' => $blogPost->getCreatedAt()->format('Y-m-d H:i:s'),
        ':id' => $blogPost->getId(),
      ]);

      return $this->findBlogPostById($blogPost->getId());
    }
  }

  public function getBlogPostsTotalCount(): int
  {
    $stmt = $this->pdo->prepare('SELECT count(*) FROM blog_post');
    $stmt->execute();

    return (int) $stmt->fetchColumn();
  }

  public function deleteBlogPost(BlogPost $blogPost): int
  {
    $stmt = $this->pdo->prepare('DELETE FROM blog_post WHERE id = :id');
    $stmt->execute([':id' => $blogPost->getId()]);

    return $blogPost->getId();
  }
}