<?php
require_once 'Twig/Autoloader.php';
// include 'config.php';

Twig_Autoloader::register();

try {
    $dbh = new PDO('mysql:dbname=gallery;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $id = $_GET['id'];
    $sql = "SELECT images.title AS title, images.count AS count, images.alt AS alt FROM images WHERE images.id = $id";
    $sth = $dbh->query($sql);
    if ($row = $sth->fetchObject()) {
        $update = "UPDATE images SET count=count+1 WHERE images.id=$id";
        $dbh->query($update);
    }
    unset($dbh);

    $loader = new Twig_Loader_Filesystem('src/templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('fullimage.tmpl');
    echo $template->render(array (
        'id' => $row->id,
        'title' => $row->title,
        'count' => $row->count,
        'alt' => $row->alt
    ));
} catch (Exception $e) {
    die ('Error: ' . $e->getMessage());
}
?>
