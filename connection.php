<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "webx hub p1";
$con = mysqli_connect($servername, $username, $password, $db);
if (!$con) {
die('Connection failed: ' . mysql_error());
}else{
//echo "Database Connected successfully"; // in case of success
}



?>

