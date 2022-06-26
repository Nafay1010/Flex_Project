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


$T_ID = $_POST["T_ID"];
$query_0 = $conn->prepare("DELETE from teacher where USERNAME = ?");
$query_0->execute([$T_ID]);
echo '<br>';

print "<script>";
print "alert('Student Record Deleted Successfully.');";
print "self.location='Add_del_Faculty.php';";
print "</script>";




?>