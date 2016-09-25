<?php
require 'core2.php';
require 'conne.inc.php';

 
 
 $bookid=$_GET['id'];
	
		
 
	       $status="Active";
		   
		        $queryy="UPDATE `book` SET `status`='Active' WHERE book_id=$bookid";
                    if($dhanu=mysql_query($queryy))
                       {    header('Location:adminpanel.php');}
	           
				      
					   else
					   {
					      echo'ERROR1';
					   }
		         
	 
?>	
