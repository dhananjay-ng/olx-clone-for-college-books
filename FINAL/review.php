<?php
require 'core2.php';
require 'conne.inc.php';

if(isset($_POST['rev']))
 {
$rev=$_POST['rev'];

$user_id=$_SESSION['user_id'];
 if(!empty($rev))
{

$queryy="INSERT INTO `review`(`id`, `rev`) VALUES ('".$user_id."','".$rev."')";
if($queryyrun=mysql_query($queryy)){ header('Location: revieww.php');}
else
{
echo'<br>Sorry can not post requirement at this time, Try again later<br><br>';
}

}

}

?><!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Mar 2015 14:01:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
           <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li class="active"><a href="HOME2.php">Home</a></li>
            <li><a href="post2.php">Post Add</a></li>
            <li><a href="wlist2.php">Wish List</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <li><a href="accountinfo.php">My Profile</a></li>
                <li><a href="checkadds.php">My Adds</a></li>
                <li><a href="yourbookings.php">My Bookings</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Other</li>
                <li><a href="removeadds.php">Remove Add</a></li>
                <li><a href="requirementpage.php">Current Requirement</a></li>
            <li><a href="review.php">Submit Feedback</a></li>
              
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
 <li><a href="revieww.php">User Reviews</a></li>
		   <li><a href="logout.php">Logout</a></li>
			<span class="sr-only">(current)</span></a></li>
            <li><a href="accountinfo.php"><?php echo getuserfield('fname').' '.getuserfield('lname');?>
</a></li>
            </ul>
        </div> </div>
        </nav>

      </div>
    </div>
	<div><br><br><br><br><br><br><br>
<div>
<marquee><h5>Your <i>SUGGESTIONS</i> are warmly Welcome !!!</h5></marquee>
</div>
<form class="form-horizontal" action="review.php" method="POST">
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Suggestions :</label>


    <div class="col-sm-10">
   <textarea class="form-control" rows="6" name="rev"></textarea> 
   </div>
 <br>
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <br><br> &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
