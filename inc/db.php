<?php // Database konfigurasjon
$db_host = '#';
$db_user = '#';
$db_pwd = '#';
$db_name = '#';

try{
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
  echo '<strong>MySQL error:</strong> ' . $e->getMessage();
  die();
}
?>
