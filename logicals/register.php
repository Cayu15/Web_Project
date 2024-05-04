<?php
if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['lname']) && isset($_POST['fname']) && isset($_POST['email'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=database', 'root', '',
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
            $sqlInsert = "insert into user(user_id, lastname, firstname, username, password, email)
                          values(0, :lname, :fname, :username, :password, :email)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':lastname' => $_POST['lname'], ':firstname' => $_POST['fname'],
                                 ':username' => $_POST['user'], ':password' => sha1($_POST['password']))); 
            if($count = $stmt->rowCount()) {
                $newuser_id = $dbh->lastInsertuser_id();
                $message = "A regisztrációja sikeres.<br>Azonosítója: {$newuser_id}";                     
                $retry = false;
            }
            else {
                $message = "A regisztráció nem sikerült.";
                $retry = true;
            }
        }
    }
    catch (PDOException $e) {
        $message = "Hiba: ".$e->getMessage();
        $retry = true;
    }      
}
?>