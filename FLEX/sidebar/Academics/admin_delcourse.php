<?php
session_start();
$username = "root";
$password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=flex", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
// echo 'HI';
echo '<pre>';
// print_r($_POST);
//var_dump($_POST);

} 

catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}


$C_ID = $_POST["CoursesAdd"];
$query_0 = $conn->prepare("DELETE from course_info where C_ID = ?");
$query_0->execute([$C_ID]);
echo '<br>';

print "<script>";
print "alert('Course Deleted Successfully.');";
print "self.location='Academics_course.php';";
print "</script>";




?>