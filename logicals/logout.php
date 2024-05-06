<?php
    require_once("config.inc.php");

    session_destroy();

    header("Location: index.php");
?>