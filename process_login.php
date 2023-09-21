<?php
session_start();
$senior_username = "principal"
$senior_password = "admin"
$valid_username = "mwalimu";
$valid_password = "Hapa ni wapi?";

if (isset($_POST['username']) && isset($_POST['password'])){
	$entered_username = $_POST['username'];
	$enterd_password = $_POST['password'];

	if ($entered_username == $valid_username && $enterd_password == $valid_password) {
		$_SESSION['logged_in'] = true;
		header("location:dashboard.php");
	} elseif ($entered_username === $senior_username && $enterd_password === $senior_password){
		$_SESSION['logged_in'] = true;
		header("location:dashboard.php");
	} else {
		echo "Invalid username or password. <a href='login.php'> Try again </a>";
	}
}else {
	echo "Please enter both username and password. <a href='login.php'>Try again</a>";
}
?>