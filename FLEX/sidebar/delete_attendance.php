<?php
    session_start();
    $username = 'root';
                $password = '';
                // Check connection
                try 
                {
                    $conn = new PDO("mysql:host=localhost;dbname=flex", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
	if(isset($_POST["btndrop"]))
	{
        $user_name = $_SESSION['Username'];
        $date = $_POST["Date"];
		$_SESSION["CoursesDel"] = $_POST['CoursesDel'];
        $course = $_SESSION["CoursesDel"];
		echo "DATE: ", $date;
        echo "<br>";
        echo "Course: ", $course;
		echo "Session COURSE: " .$_SESSION["CoursesDel"];
        // $con=mysqli_connect("localhost","root","","flex");
        // $query = "select *from `student`";
		// $result = mysqli_query($con,$query)or die("select error");
		$query = $conn->prepare("delete from attendance where Date = ? AND C_ID = ? AND T_ID = ?"); 
        $query->execute([$date, $course, $user_name]);
        // $result   = $query->fetchAll(PDO::FETCH_ASSOC);
		// foreach($result as $val)
		// {
		// 	$mno = $val["USERNAME"];
		// 	if(isset($_POST[$mno]))
		// 	{
		// 		$query1 = $conn->prepare("INSERT INTO  `attendance`(`USERNAME` ,  `Date` , `C_ID`,  `Attendance`) VALUES(?,?,?,?)");
		// 		$query1->execute([$mno, $date, $course, 'P']);
		// 	}
		// 	else
		// 	{
		// 		$query1 = $conn->prepare("INSERT INTO  `attendance`(`USERNAME` ,  `Date` , `C_ID`,  `Attendance`) VALUES(?,?,?,?)");
		// 		$query1->execute([$mno, $date, $course, 'A']);
		// 	}
		// 	// mysqli_query($con,$query1)or die("insert error".$mno);
		// 	// $result   = $query1->fetchAll(PDO::FETCH_ASSOC);
		// 	print "<script>";
		// 	print "alert('Attendance get successfully....');";
		// 	print "self.location='Teacher_Attendance.php';";
		// 	print "</script>";
		// }
		print "<script>";
		print "alert('Attendance Deleted Successfully.');";
		print "self.location='Teacher_Attendance.php';";
		print "</script>";
		echo '<a href="Teacher_Attendance.php"> GO BACK</a>';
			
		
	}
	else
	{
		// echo "Something wrong happened...";
	}
?>