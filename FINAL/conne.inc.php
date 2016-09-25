<?php
mysql_connect('localhost','root','') or die("NOT CONNECTED");
$cc=mysql_select_db('project');
if(!$cc)
{echo'UNSUCCEFUL CONNECTION';}
else
{
echo'';
}
?>
