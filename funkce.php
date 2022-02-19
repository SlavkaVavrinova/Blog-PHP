<?php

function vypisMenu(array $polozkyMenu) : string
 {
  $vystup = "";
  foreach($polozkyMenu as $polozka){

    $vystup .='<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="' . $polozka['href'] . '">' . $polozka['nazev'] . '</a></li>';

  }
  return $vystup;
};

function preloz(string $preloz): string
{
  if (array_key_exists($preloz, PREKLADY)) {
    return PREKLADY[$preloz];
  }

  return $preloz;
}


function nactiController(): string
{
  $stranka = $_GET['stranka'] ?? 'domu';

  if (is_file(__DIR__ . '/controller/' . $stranka . '.php')) {
    return __DIR__ . '/controller/' . $stranka . '.php';
  } else {
    return __DIR__ . '/controller/404.php';
  }
}

?>