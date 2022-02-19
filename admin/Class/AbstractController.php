<?php

abstract class AbstractController
{
  public string $title = "Administrace webu";

  public string $template = __DIR__ . '/../page/404/404.php';

  public string $layout = __DIR__ . '/../layout/layout.php';

  public ?User $currentUser = null;

  public function __construct()
  {
    $userId = $_SESSION['userId'] ?? null;
    if ($userId) {
      $userRepository = new UserRepository();
      $this->currentUser = $userRepository->findUserById($userId);
    }
  }

  abstract public function render(): void;

  public function notFound()
  {
    $this->template = __DIR__ . '/../page/404/404.php';
    require $this->layout;
    exit();
  }
}
