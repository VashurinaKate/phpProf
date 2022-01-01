<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','gallery');
define('DB_USER','root');
define('DB_PASS','root');

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try
{ 
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS);
  
	$error_array = $db->errorInfo();
 
	if($db->errorCode() != 0000)
	    echo "SQL ошибка: " . $error_array[2] . '<br />';
  
    if(isset($_GET['limit'])) {
        $limit = $_GET['limit'];
    } else {
        $limit = 3;
    }
	$result = $db->query("SELECT * FROM `images` LIMIT $limit");
     
	while($row = $result->fetch())
	{
        $data[] = $row;
	}
    // unset($db);

    $loader = new Twig_Loader_Filesystem('src/templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('gallery.tmpl');
    echo $template->render(array (
        'data' => $data,
        'count' => count($data)
    ));
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
