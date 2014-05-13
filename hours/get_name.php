<?php
	$qname =$_GET['name'];

	include("../php/connect.php");

	$sql= mysql_query("SELECT * FROM `lowes` WHERE name LIKE \"%$qname%\"");

	while($row = mysql_fetch_array($sql)){
		$name = $row["name"];
		$in_time = $row["in_time"];
		$out_time = $row["out_time"];
		$date = $row["date"];
		$comments = $row["comments"];
		
		$in = explode(":", $in_time);
		$out = explode(":", $out_time);
		$h = $out[0] - $in[0];
		$m = $out[1] - $in[1];
	
		if($m < 0){
			$m = $m * -1;
		}
		
		$m = sprintf('%02d', $m);
	
		$total = "$h:$m";
		echo "$name - $date - From $in_time to $out_time - $comments - <b> Total $total hours.</b><br>";


	};
?>
