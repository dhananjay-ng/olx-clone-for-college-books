<?php

require 'core2.php';
require 'conne.inc.php';

$id=addslashes($_REQUEST['id']);
$image=mysql_query("SELECT image FROM book WHERE book_id=$id");
$image=mysql_fetch_assoc($image);
$image=$image['image'];

header("Content-type: image/jpeg");

echo $image;
?>
