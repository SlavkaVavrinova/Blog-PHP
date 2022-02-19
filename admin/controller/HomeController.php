<?php

class HomeController extends AbstractController
{
  public string $title = "Dashboard";

  public string $template = __DIR__ . '/../page/home/default.php';
 
  public function render(): void
  {
    $messageRepository = new MessageRepository();
    $messages = $messageRepository->findMessages();

    require $this->layout;
  }
}