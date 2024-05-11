<?php
require_once("../includes/config.inc.php");

$login_failed = false;
$errormessage = null;

if(isset($_POST['user']) && isset($_POST['password'])) {
    try {
        $dbh = new PDO($SQL['connection'], $SQL['user'], $SQL['password'],
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "SELECT user_id, lastname, firstname FROM users WHERE username = :username AND password = SHA1(:password)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindParam(':username', $_POST['user']);
        $sth->bindParam(':password', $_POST['password']);
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['ln'] = $row['lastname'];
            $_SESSION['fn'] = $row['firstname'];
            header('Location: ../');
            exit(); 
        } else {
            $errormessage = "Hibás felhasználónév vagy jelszó.";
            $login_failed = true;
        }
    } catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
} else {
    header('Location: ../');
}
echo $errormessage;

?>
