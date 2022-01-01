<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','gallery');
define('DB_USER','root');
define('DB_PASS','root');

try
{
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS);

	$sql = $db->prepare("INSERT INTO images (title, alt, size) VALUES (?,?,?)");
	// $sql->bindValue(':title', $title);
	// $sql->bindValue(':alt', $title);
	// $sql->bindValue(':size', $size);

	$title = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];

	if ($sql->execute([$title, $title, $size])) {
        header('Location: index.php');
	} else {
		die("ошибка ");
	}
    unset($db);
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
