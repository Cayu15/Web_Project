<?php if (!isset($_POST['submit']) || !isset($_POST['message']) || strlen($_POST['message']) < 1) { ?>
    <script>
        window.location.href = window.location.origin + window.location.pathname;
    </script>
<?php } else {
    try {
        $dbh = new PDO($SQL['connection'], $SQL['user'], $SQL['password'],
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        if (isset($_SESSION['user'])) {
            $sqlInsert = "insert into feedback (user, message) values(:user, :message)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':user' => $_SESSION['ln'] . " " . $_SESSION['fn'],
                ':message' => $_POST['message']
            ));
        } else {
            $sqlInsert = "insert into feedback (message) values(:message)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':message' => $_POST['message']
            ));
        }
    }
    catch (PDOException $e) {
        $message = "Hiba: ".$e->getMessage();
        $retry = true;
        exit($message);
    }
    ?>
    <div>
        <h2>Üzenet fogadva!</h2>
    </div>
    <div>
        <h3>Üzenet:</h3>
        <p>
            <?php echo $_POST['message']; ?>
        </p>
    </div>
<?php } ?>
