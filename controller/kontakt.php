<?php

$jmeno = $_POST['jmeno'] ?? null;
$email = $_POST['email'] ?? null;
$text = $_POST['zprava'] ?? null;

if ($jmeno && $email && $text) {
  $messageRepository = new MessageRepository();
  $message = new Message($jmeno, $email, $text);
  $messageRepository->saveMessage($message);

  header("location: ?stranka=kontaktOdeslano");
  exit();
}

$sablona = 'kontakt';