<?php
    require_once("../includes/config.inc.php");

    session_destroy();

    header("Location: ../");
?>