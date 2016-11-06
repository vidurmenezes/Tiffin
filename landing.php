<!DOCTYPE html>
<html lang="en">
<?php session_start();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tiffin</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap2.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="grayscale.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
       
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll">
                    <i class="fa fa-play-circle"></i>  <span class="light">Tiffin</span> 
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
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
						<a href = "signout.php">signout</a>
						</li>
						';
					}
					?>
                    
                    <?php
					if(isset($_SESSION["logged"]))
						echo"<li><a href = 'postings/postings.php'>Postings</a></li>";
					?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
       <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Tiffin</h1>
                
                        

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About <a>TIFFIN</a></h2>
                <p>Tiffin a web service aimed mostly at university students to create a network of cooks and food for our users to discover. It is a platform where people who are looking for homemade food and people 
				who have extra food can meet up. According to the Financial Consumer Agency of Canada, in 2013 and 2014, the average cost of a year’s tuition at a Canadian university was $5,772. This number rises for
				subsequent years and as tuition rises, students have less money to spend. Tiffin provides a medium for students to have a cheap, healthy lunch so they do not have to worry about spending too much on food.
				</p>
            </div>
        </div>
    </section>

    <!-- Download Section -->

         
 <?php  if(!isset($_SESSION["logged"])){
						echo"
		    <div class='download-section'>
    <section id='download' class='container content-section text-center'>			  
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2'>
            <div class='container'>
                
                <p id='signin'> Sign In</p>
               
                    
                    

<form action='signin.php' method = 'post'>
  <div class='group'>
    <input type='text' name='login' style = 'color: black;'><span class='secondhighlight'></span><span class='bar'></span>
    <label>Username or Email</label>
  </div>
  <div class='group'>
    <input type='password' name = 'pass' style = 'color: black;'><span class='secondhighlight'></span><span class='bar'></span>
    <label>Password</label>
  </div>
  
  <button type='submit' class='button buttonBlue' name = 'submit' value = 'Login'>Submit </button>

        </div>
        </div>
        </div>
                
        </div> 
    </section>

</form>		

<section id='contact' class='container content-section text-center'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2'>
	<h2>Sign Up</h2>
                <p>Just Put Some Info To Get Started</p>
				
<form action ='signup.php' method = 'post'>
	<div class='group'>
    <input type='text' name ='fname'><span class='highlight'></span><span class='bar'></span>
    <label>First Name</label>
  </div>
  <div class='group'>
    <input type='text' name ='lname'><span class='highlight'></span><span class='bar'></span>
    <label>Last Name</label>
  </div>
  <div class='group'>
    <input type='text' name ='address'><span class='highlight'></span><span class='bar'></span>
    <label>Address</label>
  </div>
  <div class='group'>
    <input type='text' name ='postcode'><span class='highlight'></span><span class='bar'></span>
    <label>Postal Code</label>
  </div>
    <div class='group'>
    <input type='email' name='email'><span class='highlight'></span><span class='bar'></span>
    <label>Email</label>
  </div>
  <div class='group'>
    <input type='text' name ='username'><span class='highlight'></span><span class='bar'></span>
    <label>Username</label>
  </div>

  <div class='group'>
    <input type='password' name='pass'><span class='highlight'></span><span class='bar'></span>
    <label>Password</label>
  </div>
    <div class='group'>
    <input type='text' name='phone'><span class='highlight'></span><span class='bar'></span>
    <label>Phone Number</label>
  </div>
  <button type='submit' class='button buttonBlue' name='submit' value = 'SignUp'>Submit

  </button>
</form>";
 }
?>
    
    
                
                <script>
$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
  });

});


</script>
                     




                
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer>

        <div class="container text-center">
            
            <ul class="list-inline banner-social-buttons">
                    
                    <li>
                        <a href="https://facebook.com/vidur.menezes" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="https://ca.linkedin.com/in/vidur-menezes-41076397" class="btn btn-default btn-lg"><i class="fa fa-linkedfa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
   
    <p>Copyright &copy; Your Website 2016</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="grayscale.js"></script>

</body>

</html>
