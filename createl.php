<?php
session_start();
$_SESSION['dish'] = $_POST['dish'];
$_SESSION['price'] = $_POST['price'];
$_SESSION['about'] = $_POST['about'];

$about = $_SESSION['about'];
$price = $_SESSION['price'];
$dish = $_SESSION['dish'];
$UID = $_SESSION['UID'];


$dbhost = 'localhost:3306';
$dbuser = 'admin';
$dbpass = 'tiffin1';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn){
	header ("location:/error.html");
}
$sql = "INSERT INTO fooddata ". "(OID,UID,Price,About,Name,Time) ".
"VALUES(0,'$UID','$price','$about','$dish',NOW())";
mysql_select_db('tiffindb');
$retval = mysql_query( $sql, $conn );
if(! $retval){
	header("error.html");
}
header("location:/../postings/postings.php");
mysql_close($conn);
?>