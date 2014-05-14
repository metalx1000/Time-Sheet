<?php
$db_host = "localhost";
$db_user = "user";
$db_pass = "password";
$db_name = "user";

@mysql_connect("$db_host","$db_user","$db_pass") or die ("Could Not Connect");
@mysql_select_db("$db_name") or die ("Could not find DB");


?> 
