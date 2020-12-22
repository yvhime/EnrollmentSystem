<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "admin_vhvh";
$password = "admin";
$databasename = "newsystem";

//create connection
$connect = mysqli_connect($servername, $username, $password, $databasename);
//check connection
if(!$connect) {
	die("Connection to the database failed. " . mysqli_connect_error());
}
?>
<head>
	<title></title>
</head>
<body>

</body>
</html>