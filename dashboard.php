<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
	header("Location: login.php");
	exit;
}

$students_data = file("students.txt");
$marks_data = file("marks.txt");

$number_of_students = count($students_data);

$total_marks = 0;
$average_marks = 0;

$students_marks = array();

foreach ($marks_data as $line) {
	list($student_first_name, $student_last_name, $student_admission_number, $marks) = explode(", ", trim($line));

	$total_marks += (int)$marks;

	$students_marks[$student_admission_number] = $marks;

	if ($number_of_students > 0){
		$average_marks = $total_marks / $number_of_students;
	}
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

	<p>You have: <?php echo $number_of_students; ?> students</p>
	<p>Student Average Marks: <?php echo number_format($average_marks, 2); ?></p>
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Admission No.</th>
			<th>Marks</th>
		</tr>
		<?php
		foreach ($students_data as $line) {
			list($student_first_name, $student_last_name, $student_admission_number) = explode(", ", trim($line));
			$marks = isset($students_marks[$student_admission_number]) ? $students_marks[$student_admission_number]: "N/A";
			echo "<tr><td>$student_first_name</td> <td>$student_last_name</td> <td>$student_admission_number</td> <td>$marks</td></tr>";
		}
		?>
		
	</table>
	<p>Average Marks: <?php echo number_format($average_marks, 2); ?></p>
	

</body>
</html>