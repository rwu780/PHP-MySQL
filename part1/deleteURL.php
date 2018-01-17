<?php
include "connectDB.php";

session_start();
$username = $_SESSION['userName'];

$old = $_REQUEST['old'];
$oldURL = json_decode($old);

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
foreach ($oldURL as $o) {
	# code...
	echo "$o";
	$sql = "DELETE FROM URL WHERE userID = '$userID' AND url = '$o'";

	if(!mysqli_query($con, $sql)){
		echo "Error: ".mysqli_error($con);
	}
}

echo $sql;

mysqli_close($con);

?>