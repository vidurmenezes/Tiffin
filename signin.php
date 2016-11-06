<?php
Session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['pass'] = $_POST['pass'];
$user = $_SESSION['login'];
$pass = $_SESSION['pass'];
$dbhost = 'localhost:3306';
$dbuser = 'admin';
$dbpass = 'tiffin1';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn){
	header("error.html");
}
$sql = 'select Login, Email, Pass, UID from userdata';
mysql_select_db('tiffindb');
$retval = mysql_query( $sql, $conn );
if(!$retval){
	header("error.html");
}
while($row = mysql_fetch_array($retval, MYSQL_NUM)){
	if((($user == $row[0]) or ($user == $row[1])) and ($pass == $row[2])){
		$_SESSION["logged"] = True;
		$_SESSION['UID'] = $row[3];
		header ("location:postings/postings.php");
		die();
	}
}
echo ("Username or password incorrect. Please try again!");
header ("location:/index.php");

?>