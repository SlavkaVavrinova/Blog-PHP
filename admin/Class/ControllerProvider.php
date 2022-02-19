<?php

class ControllerProvider
{

  private UserRepository $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
  }

  public function getController(): AbstractController
  {
    $userId = $_SESSION['userId'] ?? null;
    if ($userId and $user = $this->userRepository->findUserById($userId)) {
      $page = $_GET['page'] ?? 'home';

      $className = ucfirst($page) . 'Controller';

      if (is_file(__DIR__ . '/../controller/' . $className . '.php')) {
        require __DIR__ . '/../controller/' . $className . '.php';
        return new $className();
      } else {
        require
          __DIR__ . '/../controller/NotFoundController.php';

        return new NotFoundController();
      }
    } else {
      require
        __DIR__ . '/../controller/LoginController.php';
      return new LoginController();
    }
  }
}
