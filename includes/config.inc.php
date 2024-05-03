<?php
$title = array(
    'title' => 'KézműKuckó',
);
$pages = array(
    '/' => array('file' => 'main', 'text' => 'Főoldal', 'onmenu' => array(1,1)),
    'gallery' => array('file' => 'gallery', 'text' => 'Galéria', 'onmenu' => array(1,1)),
    'contact' => array('file' => 'contact', 'text' => 'Kapcsolat', 'onmenu' => array(1,1)),
    'contact_feedback' => array('file' => 'contact_feedback', 'text' => 'Visszajelzés', 'onmenu' => array(1,1)),
    'table' => array('file' => 'table', 'text' => 'Táblázat', 'onmenu' => array(1,1)),
    'login' => array('file' => 'login', 'text' => 'Belépés', 'onmenu' => array(1,0)),
    'register' => array('file' => 'register', 'text' => 'Regisztráció', 'onmenu' => array(1,0)),
    'logout' => array('file' => 'logout', 'text' => 'Kijelentkezés', 'onmenu' => array(0,1))
);

$error_page = array('file' => '404', 'text' => 'A keresett oldal nem található!');

?>