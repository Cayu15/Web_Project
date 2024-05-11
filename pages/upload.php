<?php
    $message = array();   

    if (isset($_POST['send'])) {
        foreach($_FILES as $file) {
            if ($file['error'] == 4);   
            elseif (!in_array($file['type'], $MEDIATYPE))
                $message[] = " Nem megfelelő típus: " . $file['name'] . "(" . $file['type'] . ")";
            elseif ($file['error'] == 1   
                        or $file['error'] == 2   
                        or $file['size'] > $MAXSIZE) 
                $message[] = " Túl nagy állomány: " . $file['name'];
            else {
                $finalplace = $FOLDER . strtolower($file['name']);
                if (file_exists($finalplace))
                    $message[] = " Már létezik: " . $file['name'];
                else {
                    if (move_uploaded_file($file['tmp_name'], $finalplace)) {
                        $message[] = ' Ok: ' . $file['name'] . "(" . $finalplace . ")";
                    } else {
                        $message[] = ' Hiba: nem sikerült a fájl másolása (' . $finalplace . ")";
                    }
                }
            }
        }        
    }

?>
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
    <form action="?page=upload" method="post"
        enctype="multipart/form-data">
        <input type="file" name ="upfile" required>
        <input type="submit" name="send">
    </form>
