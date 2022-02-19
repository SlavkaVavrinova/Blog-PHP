<?php

$jazyk = $_SESSION['jazyk']??'cs';

require __DIR__ . '/preklady/' . $jazyk . '.php';

$povoleneJazyky=[
  'cs'=>'cestina',
  'en'=>'anglictina',
];

$jmeno = "Slávka";
$prijmeni = "Vavřinová";

$den = 4;
$mesic = 1;
$rok = 1986;

$datumNarozeni = $den . '. '. $mesic . '. '.$rok;

$email = "slavka.vav@gmail.com";



$polozkyMenu = [
  ['nazev' => 'Domů', 'href' => '?stranka=domu'],
  ['nazev' => 'Blog', 'href' => '?stranka=blog'],
  ['nazev' => 'Kontakt', 'href' => '?stranka=kontakt'],
];


?>