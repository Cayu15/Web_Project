<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title['title'] ?></title>
    <link rel="stylesheet" href="./styles/styl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">KézműKuckó</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach($pages as $url => $page){ ?>
            <?php if(! isset($_SESSION['login']) && $page[$onmenu][0] || isset($_SESSION['login']) && $page['onmenu'][1]){ ?>
                <li<?= (($page == $search) ? ' class="active")' : '') ?>>
                    <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                    <?= $page['text'] ?></a>
                </li>
            <?php } ?>
        <?php } ?> 
      </ul>
    </div>
    </div>
    </nav>
<div id="content">
    <?php
        include("./pages/{$search['file']}.php");
     ?>
</div>
</body>
</html>