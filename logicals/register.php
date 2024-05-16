<?php

require_once("../includes/config.inc.php");

if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['lname']) && isset($_POST['fname']) && isset($_POST['email']))
{
    if(!isset($_POST['fname']) || strlen($_POST['fname']) < 3)
    {
        exit("Hibás keresztnév: ".$_POST['fname']);
    }

    if(!isset($_POST['lname']) || strlen($_POST['lname']) < 3)
    {
        exit("Hibás Vezetéknév: ".$_POST['lname']);
    }

    $emailRegex = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    if(!isset($_POST['email']) || !preg_match($emailRegex,$_POST['email']))
    {
        exit("Hibás email: ".$_POST['email']);
    }

    if(!isset($_POST['password']) || empty($_POST['password']))
    {
        exit("Hibás jelszó: ".$_POST['password']);
    }

    try {
        $dbh = new PDO($SQL['connection'], $SQL['user'], $SQL['password'],
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        $sqlSelect = "select user_id from users where username = :username";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':username' => $_POST['user']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $message = "A felhasználói név már foglalt!";
            $retry = "true";
        }
        else {
            $sqlInsert = "insert into users (user_id, lastname, firstname, username, password, email)
                          values(0, :lname, :fname, :username, :password, :email)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(
                                ':lname' => $_POST['lname'],
                                ':fname' => $_POST['fname'],
                                ':username' => $_POST['user'],
                                ':password' => sha1($_POST['password']),
                                ':email' => sha1($_POST['email'])
                            )); 
            if($count = $stmt->rowCount()) {
                $newuser_id = $dbh->lastInsertId();                  
                $retry = false;
                $message = "A regisztráció sikeres.";
                header("Location: ../index.php");
            }
            else {
                $message = "A regisztráció nem sikerült.";
                $retry = true;
                header("Location: ../index.php");
            }
        }
    }
    catch (PDOException $e) {
        $message = "Hiba: ".$e->getMessage();
        $retry = true;
        echo $message;
    }      
}

else
{
    header("Location: ../index.php");
    exit();
}
?>
