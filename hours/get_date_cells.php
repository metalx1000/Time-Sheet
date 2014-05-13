<?php
	$qname =$_GET['name'];
	$startDate= $_GET['startDate'];
	$endDate=$_GET['endDate'];

	$startDate = date('Y-m-d', strtotime($startDate));
	$endDate = date('Y-m-d', strtotime($endDate));

	include("../php/connect.php");

	$sql= mysql_query("SELECT * FROM lowes WHERE date BETWEEN STR_TO_DATE('$startDate','%Y-%m-%d') AND STR_TO_DATE('$endDate','%Y-%m-%d')");
	//$sql= mysql_query("SELECT * FROM `lowes` WHERE name LIKE \"%$qname%\"") AND ("WHERE date BETWEEN STR_TO_DATE('$startDate','%d-%m-%Y') AND STR_TO_DATE('$endDate','%d-%m-%Y')");

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
		echo "<tr>";
		echo "<td>$name</td><td>$date</td><td>$in_time</td><td>$out_time</td><td>$comments</td><td><b> Total $total hours.</b></td>";
		echo "</tr>\n";


	};

?>
