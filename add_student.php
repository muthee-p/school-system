<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	header("Location: login.php");
	exit;
}
if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$student_first_name = $_POST["student_first_name"];
	$student_last_name = $_POST["student_last_name"];
	$student_admission_number = $_POST["student_admission_number"];

	$students_data = file("students.txt");
	foreach ($students_data as $line) {
		list($existing_first_name, $existing_last_name, $existing_admission_number) = explode(", ", trim($line));
		if($existing_admission_number == $student_admission_number){
			echo "Student admission number $student_admission_number already exists. <a href='add_student.php'>Try again</a>";
			exit;
		}
	}


	$data = "$student_first_name, $student_last_name, $student_admission_number\n";
	file_put_contents("students.txt", $data, FILE_APPEND);

	header("Location: dashboard.php");
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add student</title>
</head>
<body>
	<h1>Welcome, Teach</h1>
	<a href="add_student.php">Add a student</a>
	<a href="assign_marks.php">Assign Marks</a>
	<a href="logout.php">Logout</a>

	<form method="post" action="">
		Student First Name: <input type="text" name="student_first_name"><br>
		Student Last Name: <input type="text" name="student_last_name"><br>
		Student Admssion Number: <input type="text" name="student_admission_number"><br>
		<input type="submit" value="Add student">
		
	</form>
	<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>