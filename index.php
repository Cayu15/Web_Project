<?php 
include('./includes/config.inc.php');

$pageParam = '/';
if (isset($_GET['page']))
    $pageParam = $_GET['page'];

if (isset($_POST['page']))
    $pageParam = $_POST['page'];

$search = $pages['/'];
if ($pageParam != '/'){
    if (isset($pages[$pageParam]) && file_exists("./pages/{$pages[$pageParam]['file']}.php")){
        $search = $pages[$pageParam];
    } else {
        $search = $error_page;
        header("HTTP/1.0 404 Not Found");
    }
}
include('./index.tmpl.php');
?>