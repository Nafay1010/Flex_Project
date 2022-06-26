<?php
session_start();
$username = "root";
$password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=flex", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
$_SESSION["Username"] = $_GET['Username'];
$_SESSION["Password"] = $_GET['Password'];
// echo "Session variable is set: " .$_SESSION['Username'];
$P = $_GET['Password'];
$user_name = $_GET['Username'];
// $query_1 = $conn->prepare("select * from login where USERNAME = ?"); 

$query_1 = $conn->prepare("select * from login where USERNAME = ?"); 
$query_1->execute([$user_name]);

$result = $query_1->fetch(PDO::FETCH_ASSOC);

$db_pass = $result['PASSWORD'];

if  ($db_pass == $P)
{
    if (substr($db_pass, 0, 1) == 'S') 
    {
        header('Location:./StudentPortal.php');
    }
}
else
{
    echo 'INCORRECT Password';
    print "<script>";
	print "alert('INCORRECT Password!');";
	print "self.location='MainPage.html';";
	print "</script>";
}

if  ($db_pass == $P)
{
    if (substr($db_pass, 0, 1) == 'T') 
    {
        header('Location:./TeacherPortal.php');
    }
}
else
{
    echo 'INCORRECT Password';
    print "<script>";
	print "alert('INCORRECT Password!');";
	print "self.location='MainPage.html';";
	print "</script>";
}


if  ($db_pass == $P)
{
    if (substr($db_pass, 0, 5) == 'admin') 
    {
        header('Location:./Academics/AcademicsPortal.html');
    }
}
else
{
    echo 'INCORRECT Password';
    print "<script>";
	print "alert('INCORRECT Password!');";
	print "self.location='MainPage.html';";
	print "</script>";
}


echo '<a href="./MainPage.html">Click here to go back to main page</a>';
?>

