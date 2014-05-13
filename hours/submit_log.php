
<?php
	include("../headers/header1.php");
 
	$name = $_POST['name'];
	$grp = $_POST['grp'];
	$in_time = $_POST['in_time'];
	$out_time = $_POST['out_time'];
	$comments = $_POST['comments'];

	$timestamp = $_POST['date'];
	$date = date('Y-m-d', strtotime($timestamp));

	include('../php/connect.php');

	mysql_query("INSERT INTO lowes (id, name, date, grp, in_time, out_time, comments, timestamp) VALUES (NULL, \"$name\", \"$date\", \"$grp\", \"$in_time\", \"$out_time\", \"$comments\", \"$timestamp\")") or die(mysql_error());
	
?>
