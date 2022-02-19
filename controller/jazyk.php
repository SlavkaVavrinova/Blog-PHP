<?php

$novyJazyk = $_GET['jazyk'] ?? 'cs';

if (array_key_exists($novyJazyk, $povoleneJazyky)) {
  $_SESSION['jazyk'] = $novyJazyk;
} else {
  $_SESSION['jazyk'] = 'cs';
}

header("location: index.php");
exit();