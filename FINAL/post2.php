
<?php
require 'core2.php';
require 'conne.inc.php';
   


if(isset($_POST['bookname'])&&isset($_POST['author'])&&isset($_POST['publication'])&&isset($_POST['edition'])&&isset($_POST['category'])&&isset($_POST['description'])&&isset($_POST['price']))
{

   
 $bookname=$_POST['bookname'];
$author=$_POST['author'];
$publication=$_POST['publication'];
$edition=$_POST['edition'];
$category=$_POST['category'];
$description=$_POST['description'];
$price=$_POST['price'];
$status="Deactive";
if(!empty($_POST['bookname'])&&$_POST['author']&&$_POST['category']&&$_POST['price']) 
{
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
$userid=$_SESSION['user_id'];


 $file=$_FILES['photo']['tmp_name'];
   
   if($file)
   {
     $image=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $image_name=addslashes($_FILES['photo']['name']); 
    $image_size=getimagesize($_FILES['photo']['tmp_name']);
	if($image_size==NULL)
	{
		 $query="INSERT INTO `book`(`name`, `author`, `publication`, `edition`, `description`,  `price`,`category`,`status`)
          VALUES ('".$bookname."','".$author."','".$publication."','".$edition."','".$description."','".$price."','".$category."','".$status."')";
	}
	else
	{

   
          $query="INSERT INTO `book`(`name`, `author`, `publication`, `edition`,  `description`,  `price`,`category`,`status`,`imagename`,`image`)
          VALUES ('".$bookname."','".$author."','".$publication."','".$edition."','".$description."','".$price."','".$category."','".$status."','".$image_name."','".$image."')";
     }
   }
    else
	{
	$query="INSERT INTO `book`(`name`, `author`, `publication`, `edition`, `description`,  `price`,`category`,`status`)
          VALUES ('".$bookname."','".$author."','".$publication."','".$edition."','".$description."','".$price."','".$category."','".$status."')";
	
	
	}
  
$runquery=mysql_query($query);
if($runquery)
{
$query=" SELECT `book_id` FROM `book` WHERE  `name`='$bookname' and `author`='$author' and `price`='$price' and `edition`='$edition' and `price`='$price' and `description`='$description'";
$runquery=mysql_query($query);
if($runquery)
{
while($row=mysql_fetch_assoc($runquery))
{
$bookid=$row['book_id'];

	  
$query1="INSERT INTO `ads`(`user_id`, `book_id`, `post_date`, `exp_date`)
          VALUES ('".$userid."','".$bookid."',CURDATE(), DATE_ADD(CURDATE(),INTERVAL 30 DAY))";
}if($run=mysql_query($query1))
{		  
header('Location:HOME2.php');
}
}
else"no bookid";
}
else
{
echo'please try after some time';
}
}
else
{
echo'please login';

}

}
else
{
echo'Fields marked with an asterisk (*) are required. ';
}
}
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post The BooK Ad</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="navbar-static-top.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
	<style type="text/css">
<style type="text/css">

.auto-style5 {
	color: #FF0000;
}
.newStyle1 {
	color: #800080;
	visibility: visible;
	display: block;
	position: static;
	width: auto;
	height: auto;
	top: auto;
	right: 100px;
	left: 100px;
}
.auto-style1 {
	margin-bottom: 0px;
}
.auto-style2 {
	text-decoration: none;
}
.auto-style3 {
	background-color: #C0C0C0;
}



</style>
</head>

<body class="newStyle1">
  <!-- Static navbar -->
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<h2>&nbsp;&nbsp;&nbsp;Post Add</h2>
	
	
	
	
	
	
<form id="form1" name="form1" method="POST" action="post2.php" class="newStyle1" enctype="multipart/form-data">
   
    <br class="auto-style1" />
  
 
  <p class="newStyle1"> &nbsp;&nbsp;&nbsp;Book Name <span class="auto-style5">* </span> <br class="auto-style1" />
    &nbsp;&nbsp;&nbsp;<input name="bookname"  type="text" maxlength="30" class="auto-style1" />
   &nbsp;
   </p>
	<p class="newStyle1"> &nbsp;&nbsp;&nbsp;Author Name<span class="auto-style5">* </span>
  </p>
	<p class="newStyle1">
    &nbsp;&nbsp;&nbsp;<input name="author" type="text"  maxlength="30" class="auto-style1" />
  
    <br />
    <br />
    &nbsp;&nbsp;&nbsp; Publication<br>
    &nbsp;&nbsp;&nbsp;<input name="publication" type="text"  maxlength="30" class="auto-style1" />
  
    <br />
    <br />
  &nbsp;&nbsp;&nbsp; Edition<br />
   &nbsp;&nbsp;&nbsp;<input type="text" name="edition" size="3" maxlength="3" class="auto-style1" />
  <br />
  <br />
  <br />
 <label for="category" class="NewStyle1">  &nbsp;&nbsp;&nbsp; Category<span class="auto-style5">* </span></label><br>
  
  &nbsp;&nbsp;&nbsp;<select name="category" class="auto-style1" size="1">
<option value="educational"class="NewStyle1">Educational</option>
<option value="novel"class="NewStyle1">Novel</option>
<option value="fiction"class="NewStyle1">Fiction</option>
<option value="biography"class="NewStyle1">Biography</option>
<option value="magazine"class="NewStyle1">Magazine</option>
<option value="children"class="NewStyle1">Children</option>

</select>
 <br><br>
  &nbsp;&nbsp;&nbsp; Description   <br />
  
  &nbsp;&nbsp;&nbsp;<textarea name="description" cols="50" rows="14" wrap="virtual" dir="ltr" lang="en" class="auto-style1"></textarea>
  </p>
   <p> &nbsp;&nbsp;&nbsp;Book Price: 
    <span class="auto-style5">* </span> 
    <br />
    &nbsp;&nbsp;&nbsp; <input name="price" type="text" value="" size="10" maxlength="10" class="auto-style1" />
  </p>
  <p> &nbsp;&nbsp;&nbsp;Upload photo: 
    <span class="auto-style5">   </span> 
    <br />
     &nbsp;&nbsp;&nbsp;<input name="photo" type="file"  class="auto-style1" />
  </p>
 
  <p>
    &nbsp;&nbsp;&nbsp; <label class="newStyle1Copy">
   &nbsp;&nbsp;&nbsp;  <input type="submit" name="Submit" value="Submit" class="newStyle1" /></label></p>
</form>
<script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
 
</body>
</html>










