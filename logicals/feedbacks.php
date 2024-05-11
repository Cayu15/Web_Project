<?php

require_once("../includes/config.inc.php");

if (isset($_SESSION['user'])) {
    $dbh = new PDO($SQL['connection'], $SQL['user'], $SQL['password'],
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    try {
        $stmt = $dbh->query("SELECT * FROM feedback ORDER BY feedback_id DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
    catch (Exception $e) {
        echo json_encode([
            "error" => $e->getMessage()
        ]);
    }
} else {
    header('Location: ../');
}


