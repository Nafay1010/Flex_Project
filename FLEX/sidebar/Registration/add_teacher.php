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
$dob = $_POST['DOB'];
$department = $_POST['DEPARTMENT'];
$BScgpa = $_POST['BSCGPA'];
$MScgpa = $_POST['MSCGPA'];
$mobile_no = $_POST['TMOBILE_NO'];
$email = $_POST['EMAIL'];
$gender = $_POST['GENDER'];
$university = $_POST['UNIVERSITY'];
$username = $_POST['USERNAME'];
$password = $_POST['PASSWORD'];

$query_0 = $conn->prepare("insert into login(username, password) values (?,?)");
$query_0->execute([$username, $password]);

$query_1 = $conn->prepare("insert into teacher 
(NAME, MOBILE_NO, GENDER, DOB, DEPARTMENT, EMAIL, BS_GPA, MS_GPA, UNIVERSITY, USERNAME) values (?,?,?,?,?,?,?,?,?,?)");

$query_1->execute([$name, $mobile_no, $gender, $dob, $department, $email, $BScgpa, $MScgpa, $university, $username]);

echo '<br>';
// echo 'Your form has been submitted successfully';
// echo '<a href="./Registration.html">Click here to go back to main page</a>';
header('Location:/FLEX/sidebar/MainPage.html')



?>