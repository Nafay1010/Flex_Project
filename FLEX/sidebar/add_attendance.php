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
	if(isset($_POST["btnsubmit"]))
	{
        $user_name = $_SESSION['Username'];
        $date = $_SESSION["Date"];
        $C_ID = $_SESSION["Course"];
		echo "User_name: ", $user_name;
		echo "DATE: ", $date;
        echo "<br>";
        echo "Course: ", $C_ID;
        // $con=mysqli_connect("localhost","root","","flex");
        // $query = "select *from `student`";
		// $result = mysqli_query($con,$query)or die("select error");
		$query = $conn->prepare("select Student.USERNAME, NAME from student NATURAL JOIN student_course inner join teacher_course using (C_ID) where C_ID = ? AND Teacher_Course.USERNAME = ?;"); 
        $query->execute([$C_ID, $user_name]);
        $result   = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $val)
		{
			$mno = $val["USERNAME"];
			if(isset($_POST[$mno]))
			{
				$query1 = $conn->prepare("INSERT INTO  `attendance`(`USERNAME` ,  `Date` , `C_ID`, `T_ID` ,  `Attendance`) VALUES(?,?,?,?,?)");
				$query1->execute([$mno, $date, $C_ID, $user_name, 'P']);
			}
			else
			{
				$query1 = $conn->prepare("INSERT INTO  `attendance`(`USERNAME` ,  `Date` , `C_ID`, `T_ID` , `Attendance`) VALUES(?,?,?,?,?)");
				$query1->execute([$mno, $date, $C_ID, $user_name, 'A']);
			}
			// mysqli_query($con,$query1)or die("insert error".$mno);
			// $result   = $query1->fetchAll(PDO::FETCH_ASSOC);
			print "<script>";
			print "alert('Attendance Added Successfully.');";
			print "self.location='Teacher_Attendance.php';";
			print "</script>";
		}
		
		
			
		
	}
	else
	{
		echo "Something wrong happened...";
	}
?>