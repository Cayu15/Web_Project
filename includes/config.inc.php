<?php
session_start();

$login_failed = false;

function is_logged_in()
{
    return isset($_SESSION['user']);
}

$titles = array
(
    '/' => 'KézműKuckó',
    'gallery' => 'KézműKuckó - Felhasználók által feltöltött képek',
    'upload' => 'KézműKuckó - Feltöltés',
    'contact' => 'KézműKuckó - Kapcsolat',
    'contact_feedback' => 'KézműKuckó - Visszajelzés',
    'table' => 'KézműKuckó - Táblázat',
    'register' => 'KézműKuckó - Regisztráció',
    'login' => 'KézműKuckó - Bejelentkezés',
    'logout' => 'KézműKuckó - Kijelentkezés',
    'feedback' => 'KézműKuckó - Üzenet fogadva'
);

$pages = array(
    '/' => array('file' => 'main', 'text' => 'Főoldal', 'onmenu' => array(1,1)),
    'gallery' => array('file' => 'gallery', 'text' => 'Képgaléria', 'onmenu' => array(1,1)),
    'upload' => array('file' => 'upload', 'text' => 'Feltöltés', 'onmenu' => array(0,1)),
    'contact_feedback' => array('file' => 'contact_feedback', 'text' => 'Visszajelzés', 'onmenu' => array(1,1)),
    'table' => array('file' => 'table', 'text' => 'Üzenetek', 'onmenu' => array(0,1)),
    'register' => array('file' => 'register', 'text' => 'Regisztráció', 'onmenu' => array(1,0)),
    'login' => array('file' => 'login', 'text' => 'Bejelentkezés', 'onmenu' => array(1,0)),
    'logout' => array('file' => 'logout', 'text' => 'Kijelentkezés', 'onmenu' => array(0,1)),
    'feedback' => array('file' => 'feedback', 'text' => '', 'onmenu' => array(0,0)),
);

$error_page = array('file' => '404', 'text' => 'A keresett oldal nem található!');

$FOLDER = './images/';
$TYPES = array ('.jpg', '.png');
$MEDIATYPE = array('image/jpeg', 'image/png');
$DATEFORMAT = "Y.m.d. H:i";
$MAXSIZE = 500*1024;

$SQL = [
    'connection' => 'mysql:host=localhost;dbname=diyproject',
    'user' => 'root',
    'password' => '',
];
?>