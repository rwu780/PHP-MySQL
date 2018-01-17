<?php
include "connectDB.php";

session_start();
$username = $_SESSION['userName'];
$newURL = $_REQUEST["new"];
echo "$newURL";

// $con = mysqli_connect("sql208.epizy.com", "epiz_21387788", "O86pnzZO8x9L", "epiz_21387788_bookmarkingDB");

// if(mysqli_connect_errno()){
// 	echo "Could not connect to MySQL: " .mysqli_connect_error();
// }

$userID = '';
$sql = "SELECT userID FROM userInfo WHERE userName = '$username'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 0){
	echo "Opps, something wrong here.";
}

if(mysqli_num_rows($result) > 0){
	$row = $result->fetch_assoc();
	$userID = $row['userID'];
	echo "$userID";
}

if($userID == '' && $newURL == ''){
	echo "new url cannot be empty";
}

$sql = "INSERT INTO URL (userID, url) VALUES('$userID', '$newURL')";

if(!mysqli_query($con, $sql)){
	echo "Error: ".mysqli_error($con);
}

mysqli_close($con);

?>