<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	header("Location: login.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$student_admission_number = $_POST["student_admission_number"];
	$marks = $_POST["marks"];

	$students_data = file("students.txt");
	foreach ($students_data as $line) {
		list($student_first_name, $student_last_name, $admission_number) = explode(", ", trim($line));
		if($admission_number == $student_admission_number){
			$data = "$student_first_name, $student_last_name, $admission_number, $marks\n";
			file_put_contents("marks.txt", $data, FILE_APPEND);


			header("Location: dashboard.php");
			exit;


		}
	}

	echo "student with admission number $student_admission_number not found. <a href='assign_marks.php'>Try again</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Assign student marks</title>
</head>
<body>
		<h1>Welcome, Teach</h1>
	<a href="add_student.php">Add a student</a>
	<a href="assign_marks.php">Assign Marks</a>
	<a href="logout.php">Logout</a>


	<h4>Assign student marks</h4>
	<form method="post" action="">
		Student Admssion Number: <input type="text" name="student_admission_number"><br>
		Marks: <input type="text" name="marks"><br>
		<input type="submit" value="Assign student marks">
		
	</form>
	<a href="dashboard.php">Back to Dashboard</a>


</body>
</html>
