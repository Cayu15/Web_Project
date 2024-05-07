<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <script src="registration_validation.js"></script>
    <?php if(file_exists('./styles/'.$search['file'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['file']?>.css" type="text/css"><?php } ?>
</head>
<body>
    <div id="nav">
        <nav>
            <ul>
            <?php foreach($pages as $url => $page){ ?>
            <?php if(! isset($_SESSION['login']) && $page['onmenu'][0] || isset($_SESSION['login']) && $page['onmenu'][1]) { ?>
						<li<?= (($page == $search) ? ' class="active"' : '') ?>>
                            <a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
                            <?= $page['text'] ?></a>
                        </li>
                <?php } ?>
                <?php } ?> 
            </ul>
        </nav>
    </div>
    <div id="info">
        <?php if(isset($_SESSION['login'])) { ?>Bejlentkezve: <strong><?= $_SESSION['ln']." ".$_SESSION['fn']." (".$_SESSION['login'].")" ?></strong><?php } ?>
    </div>
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-6 col-sm-3">
                <?php
                    include("./pages/{$search['file']}.php");
                ?>
            </div>
        </div>
    </div>
</body>
</html>