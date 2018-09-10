<?php
// Utviklet av Sirajuddin Asjad @ Elkjøp Drammen

session_start(); ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('inc/db.php');
require('inc/functions.php');

// Global functions
GetTimezone();

if(!isset($_GET['side'])){
  header("Location: ?side=forside");
}
else{
  switch($_GET['side']){
    case 'forside': include("pages/forside.php"); break;
  	case 'images': include("pages/images.php"); break;
    case 'admin': include("pages/admin.php"); break;
  	default: include("pages/forside.php"); break;
  }
}
?>
