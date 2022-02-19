<?php

class NotFoundController extends AbstractController
{
  public string $title = "404";

  public string $template = __DIR__ . '/../page/404/404.php';

  public function render(): void
  {
    require $this->layout;
  }
}
