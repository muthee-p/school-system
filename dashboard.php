<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teacher Dashboard</title>
</head>
<body>
	<h1>Welcome, Teach</h1>
	<a href="add_student.php">Add a student</a>
	<a href="assign_marks.php">Assign Marks</a>
	<a href="logout.php">Logout</a>

</body>
</html>