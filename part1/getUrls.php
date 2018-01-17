<?php
include "connectDB.php";

session_start();
$username = $_SESSION['userName'];

$sql = "SELECT DISTINCT u.url FROM URL u, userInfo ui WHERE u.userID = ui.userID AND ui.userName = '$username'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 0){
	echo "You don't have any URLS yet<br>";
}

if(mysqli_num_rows($result) > 0){
	while($row = $result->fetch_assoc()){
		$url = $row['url'];
		if($url != ''){
			echo "<input type = 'checkbox' name = 'urls' value = '$url'><label><a href = '$url'>$url</a></label><br>";
		}
	};

}

mysqli_close($con);
?>