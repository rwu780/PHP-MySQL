<?php
include "connectDB.php";

session_start();
$username = $_SESSION['userName'];
$newURL = $_REQUEST["new"];
$oldURL = $_REQUEST["old"];

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

if($userID == '' && $newURL == '' && $oldURL == ''){
	echo "new url cannot be empty";
	exit;
}
$sql = "UPDATE URL SET url = \"$newURL\" WHERE userID = '$userID' and url = \"$oldURL\" ";
// $sql = "DELETE FROM URL WHERE userID = '$userID'";

if(!mysqli_query($con, $sql)){
	echo "Error: ".mysqli_error($con);
}



mysqli_close($con);

?>