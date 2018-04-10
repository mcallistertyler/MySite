<?php
//Dollar defines variable
$db_host = "localhost";
$db_username = "root";
$db_password = "nUDW8exG";
$db_name = "test_database"; //Database name

@mysql_connect("$db_host", "$db_username", "$db_password") or die ("Could not connect to MySQL Database, invalid login details");
@mysql_select_db("$db_name") or die ("No database");

echo"Something happened, likely successful";

?>
