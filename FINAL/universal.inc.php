
<?php
require 'core2.php';
require 'conne.inc.php';
//SET @d1 = NOW();
//set @d2 = '2015-04-10 22:17:29';

//SELECT HOUR(TIMEDIFF(@d1,@d2))AS 'd1 - d2',IF(TIMEDIFF(@d1,@d2) >= 0,'+','-') AS sign;

$sql = "UPDATE booking SET sign=IF(TIMEDIFF(exp_date,NOW()) >= 0,'+','-') WHERE sign!='=' ";
if($dhanu=mysql_query($sql))
{

$sqll = "SELECT b_id,book_id,sign FROM `booking` WHERE sign='-'";
if($dhanuu=mysql_query($sqll))
{
while($row=mysql_fetch_assoc($dhanuu))
{ 
$b_id=$row['b_id'];
$book_id=$row['book_id'];
$sign=$row['sign'];
if($sign=='-')
{
$sqli = "UPDATE `book` SET `status`='Active' WHERE book_id='$book_id'";
if($dh=mysql_query($sqli))
{

$sqt = "UPDATE booking SET sign='=' WHERE b_id='$b_id' AND book_id='$book_id'";
if(mysql_query($sqt))
{}



}
}
}
}
}	
	
?>
