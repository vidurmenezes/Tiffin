<?php
session_start();
$person = $_GET['person'];
$price = $_GET['price'];
$about = $_GET['about'];
$dayofpost = $_GET['dayofpost'];
$posttime = $_GET['posttime'];
$name = $_GET['name'];
$sp = " ";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

    <!-- Navigation -->
   <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll">
                    <i class="fa fa-play-circle"></i><span class="light">Tiffin</span>
					
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                <br>
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" style="text-align:left;" href="../../../index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../../../postings/postings.php">Food</a>
                    </li>
					<?php
					if(!isset($_SESSION["logged"])){
						echo '
						<li>
                        <a class="page-scroll" href="#signin">sign in</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#contact">sign up</a>
                    </li>
					';
					}
                    else{
						echo '
						<li>
						<a href = "/../signout.php">signout</a>
						</li>
						';
					}
					?>		
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  
<?php

$dbhost = 'localhost:3306';
$dbuser = 'admin';
$dbpass = 'tiffin1';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn){
	header("error.html");
}
$sql = 'select UID,Fname,Lname,Login,Email,Phone from userdata';
mysql_select_db('tiffindb');
$retval = mysql_query( $sql, $conn );
if(!$retval){
	header("error.html");
}
while($row = mysql_fetch_array($retval, MYSQL_NUM)){
	if($person == $row[0]){
		$Fname = $row[1];
		$Lname = $row[2];
		$Login = $row[3];
		$Email = $row[4];
		$Phone = $row[5];
	}
}
//strip phone number for tel
//mailto

echo'
    <div class="container">
      <div class="container text-center">
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
            <h2>',$Fname.$sp.$Lname,'</h2>
            <br>
            <h3>',$name,'</h3>
            <br>

            <h3>$',$price,'</h3>
            <br>
            <br>    
             <div class="container text-center">
           
            <p id="para3">',$about,'
            </p>
            </div>

              <br>
            <br>  
      <p id="para3">Posted at: ',$dayofpost.$sp.$posttime,'</p>
     
            
            <ul class="list-inline banner-social-buttons">
                    
                    <li>
                        <a href= "tel:',$Phone,'" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">',$Phone,'</span></a>
                    </li>
                    <li>
                        <a href="mailto:',$Email,'?Subject=I am interested to buy your food!" class="btn btn-default btn-lg"><i class="fa fa-linkedfa-fw"></i> <span class="network-name">',$Email,'</span></a>
                    </li>
                </ul>
        </div>
<br>
<br>
<br>
<br>

<hr>
     
    </footer>
    </div>

    <!-- /.container -->
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
';
?>
