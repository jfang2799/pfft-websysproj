<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdaddy";

$con=mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
  echo "successfully connected to MySQL.";
}
echo("<br>");

$name = "";
$desc = "";
$ISBN = "";


if(isset($_POST['itemName'])) {
	$name = $_POST['itemName'];
}

if(isset($_POST['ISBN'])) {
	$ISBN = $_POST['ISBN'];
}

if(isset($_POST['itemDescription'])) {
	$desc = $_POST['itemDescription'];
}

if(isset($_POST['itemType'])) {
	$type = $_POST['itemType'];
}

// if(isset($_POST[userID])) {
// 	$name = $_POST['itemName'];
// }


$sql = mysqli_query($con,"INSERT INTO products (name, ISBN, Description, Type, ownerID, dateAdded)
VALUES('$name,
		$ISBN, 
		$desc, 
		$type, 
		20, 						//replace with user ID later
		NOW()
		')");

?>