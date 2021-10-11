<?php
/* php & mysqol db connection file*/
$username = "root"; //mysql username
$password = ""; //mysql password
$hostname = "localhost"; //server name or ip address
$dbname = "spbur"; //your dbname

//dbconn = mysql_connect($host, $user, $pass);
$dbconn = mysqli_connect($hostname, $username, $password, $dbname);

/*
if(isset($dbconn)){
	mysql_select_db($dbname, $dbconn) or die ("<center>Error: " . mysql_error() . "</center>");
}
else{
	echo "<center> Error: Could not connect to the database.</center>";
}*/

if (mysqli_connect_errno())
{
	echo "failed to connect to MySQL: " . mysqli_connect_error();
}
/*else
	echo 'ok';*/
?> 

