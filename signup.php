<?php
Session_start();
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['postcode'] = $_POST['postcode'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['phone'] = $_POST['phone'];

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$address = $_SESSION['address'];
$pcode = $_SESSION['postcode'];
$email = $_SESSION['email'];
$user = $_SESSION['username'];
$pass = $_SESSION['pass'];
$phone = $_SESSION['phone'];

$dbhost = 'localhost:3306';
$dbuser = 'admin';
$dbpass = 'tiffin1';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn){
	header ("location:/error.html");
}


$sqlselect = 'select Login, Email from userdata';
mysql_select_db('tiffindb');
$retval = mysql_query( $sqlselect, $conn );
if(!$retval){
	header ("location:/error.html");
}
while($row = mysql_fetch_array($retval, MYSQL_NUM)){
	if(($user == $row[0]) or ($email == $row[1])){
		header("location:/index.php");
		die("User name or email already exists.");
	}
}

$sql = "INSERT INTO userdata ". "(UID,Fname,Lname,Address,Postcode,Email,Login,Pass,Phone) ".
"VALUES(0,'$fname','$lname','$address','$pcode','$email','$user','$pass','$phone')";
mysql_select_db('tiffindb');
$retval = mysql_query( $sql, $conn );
if(! $retval){
	header("error.html");
}
header ("location:/index.php#signin");
mysql_close($conn);
?>