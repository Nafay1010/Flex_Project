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

$user_name = $_SESSION["Username"];
$course = $_SESSION['Course'];
$S_ID = $_SESSION['S_ID'];

$S1 = $_POST['SI'];
$S2 = $_POST['SII'];
$FINAL = $_POST['FINAL'];
$T_S1 = $_POST['T_SI'];
$T_S2 = $_POST['T_SII'];
$T_FINAL = $_POST['T_FINAL'];
$T_OBTAINED = $_POST['G_marks_FINAL'];
$Grand_Total = $_POST['T_marks_FINAL'];
$GPA = $_POST['GPA'];

$query_0 = $conn->prepare("insert into course_marks(USERNAME, T_ID, C_ID, SI, SII, FINAL, T_SI, T_SII, T_FINAL, T_OBTAINED, Grand_Total, GPA) values (?,?,?,?,?,?,?,?,?,?,?,?)");
$query_0->execute([$S_ID, $user_name, $course, $S1, $S2, $FINAL, $T_S1, $T_S2, $T_FINAL, $T_OBTAINED, $Grand_Total, $GPA]);

echo '<br>';
// echo 'Your form has been submitted successfully';
// echo '<a href="./Registration.html">Click here to go back to main page</a>';
			print "<script>";
			print "alert('Marks Uploaded !');";
			print "self.location='Teacher_Marking.php';";
			print "</script>";
// header('Location:/FLEX/sidebar/Students_Course.php');



?>