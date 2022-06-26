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
// echo "Session Variable: " .$_SESSION["Username"];
$C_ID = $_POST["C_ID"];
$C_Name = $_POST["C_Name"];
$CR_HOURS = $_POST["CR_HOURS"];
// echo "C_ID: " .$C_ID;
$query_0 = $conn->prepare("insert into course_info(C_ID, C_NAME, CR_HOURS) values (?,?,?)");
$query_0->execute([$C_ID, $C_Name, $CR_HOURS]);
echo '<br>';
// echo 'Your form has been submitted successfully';
// echo '<a href="./Registration.html">Click here to go back to main page</a>';
print "<script>";
print "alert('Course Added Successfully.');";
print "self.location='Academics_course.php';";
print "</script>";




?>