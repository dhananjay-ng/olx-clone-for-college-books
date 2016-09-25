<?php
require 'core2.php';
require 'conne.inc.php';
if(!loggedin())
{

if(isset($_POST['emailid'])&&isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['password'])&&isset($_POST['contactno']))
 {
$password=$_POST['password'];
$password_again=$_POST['password_again'];
$firstname=$_POST['firstname'];
$surname=$_POST['surname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$username=md5($emailid);
 if(!empty($contactno)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)&&!empty($emailid)) 
{
if(strlen($firstname)>30||strlen($surname)>30||strlen($emailid)>30)
{
 echo 'please do not cross max lenth';
}
else
{
if($password!=$password_again)
{echo'<br> password dont match<br>';
}
else
{
$password_hash=md5($password);
$sql = "SELECT `user_id` FROM `user` WHERE `user_id`='$username'";
$sqlrun=mysql_query($sql);
$queryrun = "SELECT `email_id` FROM `user` WHERE `email_id`='$emailid'";
$queryrun=mysql_query($queryrun);
if(((mysql_num_rows($sqlrun))==1)||((mysql_num_rows($queryrun))==1))
{
if((mysql_num_rows($sqlrun))==1)
{
echo'Username '.$username.'  Alredy exists';
}
else if((mysql_num_rows($queryrun))==1)
{
echo'Email address '.$emailid.'  Already exists ';
}
}
else
{
$queryy="INSERT INTO `user`(`fname`, `lname`, `user_id`,`password`,`email_id`,`contact_no`) VALUES ('".$firstname."','".$surname."','".$username."','".$password_hash."','".$emailid."','".$contactno."')";
if($queryyrun=mysql_query($queryy)){ header('Location: success.php');}
else{echo'<br>Sorry can not register at this time, Try again later<br><br>';}
}
}
}
}
else
{
echo'All FIELDS ARE REQUIRED TO BE FIILED';
}
}
?>
<!DOCTYPE html>
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

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
 </head>
<body>
<h1><span class="auto-style3">&nbsp;&nbsp;&nbsp;Register</span></h1>
<br><br>
<form action="register2.php" method="POST" class="newStyle1">
<label for="firstname">&nbsp;&nbsp;&nbsp;First name</label><br>
&nbsp;&nbsp;&nbsp;<input type="text" name="firstname" id="firstname" maxlength="30" value="<?php if(isset($firstname)){echo $firstname;} ?>" /><br><br>

<label for="surname">&nbsp;&nbsp;&nbsp;Last name</label><br>
&nbsp;&nbsp;&nbsp;<input type="text" name="surname" id="surname" maxlength="30" value="<?php if(isset($surname)){echo $surname;} ?>" /><br><br>

<label for="emailid">&nbsp;&nbsp;&nbsp;Email Address</label><br>
&nbsp;&nbsp;&nbsp;<input type="text" name="emailid" id="emailid" maxlength="35" value="" /><br><br>

<label for="password">&nbsp;&nbsp;&nbsp;Choose a password</label><br>
&nbsp;&nbsp;&nbsp;<input type="password" name="password" id="password" value="" /><br><br>
<label for="password_again">&nbsp;&nbsp;&nbsp;Retype password</label><br>
&nbsp;&nbsp;&nbsp;<input type="password" name="password_again" id="password_again" value="" /></div><br><br>

<label for="contactno">&nbsp;&nbsp;&nbsp;Contact No</label><br>
&nbsp;&nbsp;&nbsp;<input type="text" name="contactno"  maxlength="13" value="" /><br><br>
<div style="clear: both;">
&nbsp;&nbsp;&nbsp;<input type="submit" name="Register" id="submitButton"
value="Register" />
</div>
</body>

<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Mar 2015 14:01:05 GMT -->
</html>


<?php
}
else if(loggedin()){echo'Already logged in';}
?>
