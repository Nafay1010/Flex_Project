<?php

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


$name = $_POST['NAME'];
$email = $_POST['EMAIL'];
$mobile_no = $_POST['SMOBILE_NO'];
$gender = $_POST['GENDER'];
$dob = $_POST['DOB'];
$cgpa = $_POST['CGPA'];
$batch = $_POST['BATCH'];
$campus = $_POST['CAMPUS'];
$degree = $_POST['DEGREE'];
$father_name = $_POST['FATHER_NAME'];
$father_no = $_POST['FATHER_NO'];
$username = $_POST['USERNAME'];
$password = $_POST['PASSWORD'];

$query_0 = $conn->prepare("insert into login(username, password) values (?,?)");
$query_0->execute([$username, $password]);

$query_1 = $conn->prepare("insert into student 
(name, email, mobile_no, gender, dob, cgpa, batch, campus, degree, father_name, father_no, username) values (?,?,?,?,?,?,?,?,?,?,?,?)");

$query_1->execute([$name, $email, $mobile_no, $gender, $dob, $cgpa, $batch, $campus, $degree, $father_name, $father_no, $username]);

echo '<br>';
// echo 'Your form has been submitted successfully';
// echo '<a href="./Registration.html">Click here to go back to main page</a>';
header('Location:/FLEX/sidebar/MainPage.html')

?>