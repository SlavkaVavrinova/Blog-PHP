<?php

class UserController extends AbstractController
{
  public string $title = "Uživatelé";

  public string $template = __DIR__ . '/../page/user/default.php';

  private UserRepository $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
    parent::__construct();
  }

  public function render(): void
  {
    $action = $_GET['action'] ?? 'default';

    if ($action === 'default') {
      $users = $this->userRepository->findUsers();
    } elseif ($action === 'create-edit') {
      if (!empty($_POST)) {
        $this->processForm();
      }
      $id = $_GET['id'] ?? null;
      if ($id) {
        $user = $this->userRepository->findUserById($id);
        if (!$user) {
          $this->notFound();
        }
      }
      $this->template = __DIR__ . '/../page/user/createEdit.php';
    } elseif ($action === 'delete') {
      $id = $_GET['id'] ?? null;
      if (!$id) {
        $this->notFound();
      }
      $user = $this->userRepository->findUserById($id);
      if (!$user) {
        $this->notFound();
      }
      $this->userRepository->deleteUser($user);

      header('location: index.php?page=user');
      exit();
    } else {
      $this->notFound();
    }

    require $this->layout;
  }

  private function processForm(): void
  {
    if (isset($_GET['id']) && $user = $this->userRepository->findUserById($_GET['id'])) {
      $user->setEmail($_POST['email']);
      $user->setName($_POST['name']);
      $user->setSurname($_POST['surname']);

      if (!empty($_POST['password'])) {
        $user->setPassword($_POST['password']);
      }


      $this->userRepository->saveUser($user);
    } else {
      $user = new User($_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password']);
      $this->userRepository->saveUser($user);
    }

    header('location: index.php?page=user');
    exit();
  }
}
