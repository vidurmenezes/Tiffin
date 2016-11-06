<?php
session_start();
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
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      function writeAddressName(latLng) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": latLng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            document.getElementById("address").innerHTML = results[0].formatted_address;
          else
            document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
        });
      }

      function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        // Write the formatted address
        writeAddressName(userLatLng);

        var myOptions = {
          zoom : 16,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
        // Draw a circle around the user position to have an idea of the current localization accuracy
        
        mapObject.fitBounds(circle.getBounds());
      }

      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

      function geolocateUser() {
        // If the browser supports the Geolocation API
        if (navigator.geolocation)
        {
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }

      window.onload = geolocateUser;
    </script>

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
                    <i class="fa fa-play-circle" href="index.php"></i><span class="light">Tiffin</span> 
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../../../../index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="postings.php">Food</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../../../../create/create.php">Create</a>
                    </li>
					<?php
					if(!isset($_SESSION["logged"])){
						echo '
						<li>
                        <a class="page-scroll" href="/../index.php#signin">sign in</a>
                    </li>
					<li>
                        <a class="page-scroll" href="/../index,php#contact">sign up</a>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-9" style="width:100%">

                <div class="row carousel-holder">
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    
                <style type="text/css">
                #map {
                     width: 100%;
                    height: 250px;
                    }
                </style>
                 <div id="map"></div>

                </div>
                </div>

                <div class="row">

					<?php
					
						$dbhost = 'localhost:3306';
						$dbuser = 'admin';
						$dbpass = 'tiffin1';
						$conn = mysql_connect($dbhost, $dbuser, $dbpass);
						if(! $conn){
							header("error.html");
						}
						
						$sql = 'select OID,UID,Price,About,Name,Time from fooddata';
						mysql_select_db('tiffindb');
						$retval = mysql_query( $sql, $conn );
						if(!$retval){
							header("error.html");
						}
						while($row = mysql_fetch_array($retval, MYSQL_NUM)){
							$person = $row[1];
							$price = $row[2];
							$about = $row[3];
							$name = $row[4];
							$timedate = $row[5];
							$pieces = explode(" ", $timedate);
							$dayofpost = $pieces[0];
							$posttime = $pieces[1];
							
							$sql = 'select UID,Fname,Lname from userdata';
							mysql_select_db('tiffindb');
							$retvalue = mysql_query( $sql, $conn );
							if(!$retvalue){
								header("error.html");
							}
							while($data = mysql_fetch_array($retvalue, MYSQL_NUM)){
								if($person == $data[0]){
									$Fname = $data[1];
									$Lname = $data[2];
								}
							}			
							echo'
							<a href= "/../cook/cook.php?&person=',$person,'&price=',$price,'&about=',$about,'&name=',$name,'&dayofpost=',$dayofpost,'&posttime=',$posttime,'">
								<div class="col-sm-4 col-lg-4 col-md-4" style="height:auto">	
									<div class="thumbnail">
										<img src="http://placehold.it/320x150" alt="">
											<div class="caption">
												<h4 class="pull-right">$',$row[2],'</h4>
												<h4>',$row[4],'</h4>
												<p style="font-size:15px">',$row[3],'</p>
												<p class="pull-right" style ="font-size:15px">',$row[5],'</p>
												<p class="pull-left" style ="font-size:15px">',$Fname." ".$Lname,'</p>	
												</div>
									</div>
								</div>
							</a>';
						}
					?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
