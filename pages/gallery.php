<?php
    $images = array();
    $reader = opendir($FOLDER);
    while (($file = readdir($reader)) !== false)
        if (is_file($FOLDER.$file)) {
            $over = strtolower(substr($file, strlen($file)-4));
            if (in_array($over, $TYPES))
                $images[$file] = filemtime($FOLDER.$file);            
        }
    closedir($reader);
    
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Képgaléria</title>
    <style type="text/css">
        div#gallery {margin: 0 auto; width: 620px;}
        div.image { display: inline-block; }
        div.image img { width: 200px; }
    </style>
</head>
<body>
    <div id="gallery">
    <h3>Felhasználók által feltöltött képek: </h3>
    <?php
    arsort($images);
    foreach($images as $file => $date)
    {
    ?>
        <div class="image">
            <a href="<?php echo $FOLDER.$file ?>">
                <img src="<?php echo $FOLDER.$file ?>">
            </a>            
            <p>Név:  <?php echo $file; ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>
