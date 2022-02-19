<?php

class BlogController extends AbstractController
{
  public string $title = "Blog";

  public string $template = __DIR__ . '/../page/blog/default.php';

  private BlogPostRepository $blogPostRepository;

  public function __construct()
  {
    $this->blogPostRepository = new BlogPostRepository();
    parent::__construct();
  }

  public function render(): void
  {
    $action = $_GET['action'] ?? 'default';

    if ($action === 'default') {
      $blogPosts = $this->blogPostRepository->findBlogPosts();
    } elseif ($action === 'create-edit') {
      if (!empty($_POST)) {
        $this->processForm();
      }
      $id = $_GET['id'] ?? null;
      if ($id) {
        $blogPost = $this->blogPostRepository->findBlogPostById($id);
        if (!$blogPost) {
          $this->notFound();
        }
      }
      $this->template = __DIR__ . '/../page/blog/createEdit.php';
    } elseif ($action === 'delete') {
      $id = $_GET['id'] ?? null;
      if (!$id) {
        $this->notFound();
      }
      $blogPost = $this->blogPostRepository->findBlogPostById($id);
      if (!$blogPost) {
        $this->notFound();
      }
      $this->blogPostRepository->deleteBlogPost($blogPost);

      header('location: index.php?page=blog');
      exit();
    } else {
      $this->notFound();
    }

    require $this->layout;
  }

  private function processForm(): void
  {
    $image = null;
    if (!empty($_FILES) and !empty($_FILES['imageUpload']) and $_FILES['imageUpload']['size'] !== 0) {
      $uploadDir = __DIR__ . '/../../assets/upload/';
      $fileUpload = new FileUpload('imageUpload', $uploadDir, true);
      $image = $fileUpload->processUpload();
    }
    if (isset($_GET['id']) && $blogPost = $this->blogPostRepository->findBlogPostById($_GET['id'])) {
      $blogPost->setTitle($_POST['title']);
      $blogPost->setSubtitle($_POST['subtitle']);
      $blogPost->setText($_POST['text']);
      if ($image) {
        $blogPost->setImage('assets/upload/' . $image['fileName']);
      }

      $blogPost->setAuthor($_POST['author']);

      $this->blogPostRepository->saveBlogPost($blogPost);
    } else {
      $blogPost = new BlogPost($_POST['title'], $_POST['subtitle'], $_POST['text'], 'assets/upload/' . $image['fileName'], $_POST['author'], new DateTime());
      $this->blogPostRepository->saveBlogPost($blogPost);
    }

    header('location: index.php?page=blog');
    exit();
  }
}
