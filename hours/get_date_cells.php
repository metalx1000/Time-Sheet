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

$d1 = date_create($in_time);
$d2 = date_create($out_time);
$diff = date_diff($d1, $d2);

$h = $diff->format("%h");
$m = $diff->format("%i");
                $m2 = $m/60*100;
                $m = sprintf('%02d', $m);

                $total = "$h:$m";
                $total2 = "$h.$m2";

                echo "<tr>";
                echo "<td>$name</td><td>$date</td><td>$in_time</td><td>$out_time</td><td>$comments</td><td><b>$total or $total2</b></td>";
                echo "</tr>\n";


        };

?>
