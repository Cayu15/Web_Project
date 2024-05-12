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
    
?>

<div class="container">
    <h1 class="mt-4">A képfeltöltéshez jelentkezz be!</h1>
    <div class="row">
        <?php
            arsort($images);
            foreach($images as $file => $date) {
        ?>
            <div class="col-md-4">
                <div class="image">
                    <a href="<?php echo $FOLDER.$file ?>" target="_blank">
                        <img src="<?php echo $FOLDER.$file ?>" class="img-fluid">
                    </a>
                    <p class="mt-2"><strong>Név:</strong> <?php echo $file; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
