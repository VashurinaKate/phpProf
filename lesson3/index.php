<?php
const PATH_TO_BIG = 'src/images/big/';
const PATH_TO_SMALL = 'src/images/small/';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $dbh = new PDO('mysql:dbname=gallery;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = "SELECT * FROM images";
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
        $data[] = $row;
    }
    unset($dbh);

    $loader = new Twig_Loader_Filesystem('src/templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('gallery.tmpl');
    echo $template->render(array (
        'data' => $data
    ));
} catch (Exception $e) {
    die ('Error: ' . $e->getMessage());
}
?>
