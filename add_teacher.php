<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	header("Location: login.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$teachers_name = $_POST["teachers_name"];
	$teacher_password= $_POST["teacher_password"];
	$class_number = $_POST["class_number"];

	$data = "$teachers_name, $teachers_password, $class_number\n";
	file_put_contents("teachers.txt", $data, FILE_APPEND);

	header("Location: dashboard.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add A New Teacher</title>
</head>
<body>
	<h1>Welcome, Principal</h1>
	<a href="add_teacher.php">Add a Teacher</a>
	<a href="view_teachers.php">Manage Teachers</a>
	<a href="logout.php">Logout</a>

	<form method="post" action="">
		Teachers Name: <input type="text" name="teachers_name"><br>
		Teachers password: <input type="text" name="teachers_password"><br>
	Class Room Number: <input type="text" name="class_number"><br>
		<input type="submit" value="Add teacher">
		
	</form>
	<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>