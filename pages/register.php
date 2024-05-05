<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
</head>
<body>
    <h3>Regisztráció: </h3>
        <form action="./logicals/register.php" method="post">
            <label>Vezetéknév: </label><input type="text" name="lname" required><br>
            <label>Keresztnév: </label><input type="text" name="fname" required><br>
            <label>E-mail: </label><input type="email" name="email" required><br>
            <label>Felhasználónév: </label><input type="text" name="user" required><br>
            <label>Jelszó: </label><input type="password" name="password" required><br>
            <input type="submit" name= register value = "Regisztráció">
        </form>
    <?php if(isset($message)) { ?>
            <h1><?= $message ?></h1>
            <?php if($retry) { ?>
                <a href="index.php?page=login">Próbálja újra!</a>
            <?php } ?>
    <?php } ?>
</body>
</html>