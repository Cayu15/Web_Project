<?php

$login_failed = false;

if(isset($_POST['user']) && isset($_POST['password'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=diyproject', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "SELECT id, lastname, firstname FROM users WHERE username = :username AND password = SHA1(:password)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindParam(':username', $_POST['user']);
        $sth->bindParam(':password', $_POST['password']);
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $_SESSION['username'] = $_POST['user'];
            header('Location: ./index.php');
            exit(); 
        } else {
            $login_failed = true;
        }
    } catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
}

?>
