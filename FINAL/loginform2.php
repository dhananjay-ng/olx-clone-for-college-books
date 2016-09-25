<!DOCTYPE html>
<html lang="en">
<body bgcolor="white" width="100%">
<div align="center">
<h1>Welcome to VJTI BOOKSHOP</h1>
</div>
<div align="center">
<img src="vjti.png" alt="VJTI Logo" />
</div>
<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Mar 2015 14:01:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head bgcolor="white" width="100%">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Welcome to VJTI BOOKSHOP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
.auto-style1 {
	color: #FFFFFF;
}
.auto-style2 {
	text-decoration: none;
}
</style>
</head>

<body>

<div class="container">

<form class="form-signin" method="POST" >
<h2 class="form-signin-heading">Please sign in</h2>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<a class="btn btn-lg btn-primary btn-block" href="register2.php" role="button">Register</a>



</form>



<?php
if(isset($_POST['login'])&&isset($_POST['password']))
{
$usernam=$_POST['login'];
$password=$_POST['password'];
$password_hash=md5($password);
$username=md5($usernam);
if(!empty($username)&&!empty($password))
{
$query="SELECT `user_id` FROM `user` WHERE `user_id`='$username' AND `password`='$password_hash'"; 
$query_run=mysql_query($query); 
if($query_run)
{ 

$query_num_rows=mysql_num_rows($query_run);

if($query_num_rows==0)
{
echo'invalid';
}
else if($query_num_rows==1){

echo $user_id=mysql_result($query_run,0,'user_id');
$_SESSION['user_id']=$user_id;
header('Location: index.php');

}

}
}
}
else
{

}


?>


</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</div>
</body>

<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Mar 2015 14:01:07 GMT -->
</html>

