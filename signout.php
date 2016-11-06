<?php
session_start(); 
session_destroy();
header("location:index.php");
echo "You have been logged out. <br>";
var_dump($_SESSION);
?>