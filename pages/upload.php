<?php
    $message = array();   

    if (isset($_POST['send'])) {
        foreach($_FILES as $file) {
            if ($file['error'] == 4);   
            elseif (!in_array($file['type'], $MEDIATYPES))
                $message[] = " Nem megfelelő típus: " . $file['name'];
            elseif ($file['error'] == 1   
                        or $file['error'] == 2   
                        or $file['size'] > $MAXSIZE) 
                $message[] = " Túl nagy állomány: " . $file['name'];
            else {
                $finalplace = $FOLDER.strtolower($file['name']);
                if (file_exists($finalplace))
                    $message[] = " Már létezik: " . $file['name'];
                else {
                    move_uploaded_file($file['tmp_name'], $finalplace);
                    $message[] = ' Ok: ' . $file['name'];
                }
            }
        }        
    }

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
        label { display: block; }
    </style>
</head>
<body>
    <h1>Feltöltés a galériába:</h1>
<?php
    if (!empty($message))
    {
        echo '<ul>';
            foreach($message as $u)
            echo "<li>$u</li>";
            echo '</ul>';
    }
?>
    <form action="upload.php" method="post"
        enctype="multipart/form-data">
        <input type="file" name ="upfile" required>
        <input type="submit" name="send">
    </form>    
</body>
</html>
