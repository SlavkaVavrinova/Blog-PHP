<?php

class LoginController extends AbstractController
{
  public string $title = "Přihlášení";

  public string $template = __DIR__ . '/../page/login/default.php';

  private UserRepository $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
    parent::__construct();
  }

  public function render(): void
  {
    $action = $_GET['action'] ?? 'default';

    if ($action === 'logout') {
      unset($_SESSION['userId']);
      header('location: index.php?page=login');
      exit();
    } else {
      $userId = $_SESSION['userId'] ?? null;
      if ($userId and $user = $this->userRepository->findUserById($userId)) {
        header('location: index.php?page=home');
        exit();
      } else {
        $error = null;
        if (!empty($_POST)) {
          $error = $this->processForm();
        }
        $this->layout = __DIR__ . '/../page/login/default.php';
      }
    }

    require $this->layout;
  }

  private function processForm(): string
  {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    if ($email and $password) {
      $user = $this->userRepository->findUserByEmail($email);
      if ($user and $user->verifyPassword($password)) {
        $_SESSION['userId'] = $user->getId();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
      }
    }
    return "Chybné přihlašovací údaje";
  }
}
