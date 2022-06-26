<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Student | Flex</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./DropDownMenu.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style>
    .btnsubmit {
    margin-bottom: 2%;
    border: none;
   border-radius: 0.4rem;
    /* padding: 0.3%; */
    background: #0471dd;
    color: #fff;
    font-weight: 600;
    width: fit-content;
    cursor: pointer;
    font-size: 1.1vw; */
}

.btnsubmit:hover {
    background: white;
    border-color: #023f23;
    color: #00e078;
    border: 2px solid;
    transition: 0.1s;
}


    .btndrop {
    margin-bottom: 2%;
    border: none;
   border-radius: 0.4rem;
    /* padding: 0.3%; */
    background: #0471dd;
    color: #fff;
    font-weight: 600;
    width: fit-content;
    cursor: pointer;
    font-size: 1.1vw; */
}

.btndrop:hover {
    background: white;
    border-color: #dd0606;
    color: #c10b0b;
    border: 2px solid;
    transition: 0.1s;
}
</style>
</head>

<body>
    <?php
                session_start();
                $username = 'root';
                $password = '';
                // Check connection
                try {
                    $conn = new PDO("mysql:host=localhost;dbname=flex", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                $user_name = $_SESSION["Username"];
                // echo "Session Variable: " .$_SESSION["Username"];
                // $Search = $_GET["user_name"];
                // $user_name = $_GET['U'];
                $query_1 = $conn->prepare("select * from COURSE_INFO"); 
                // $query_1->execute([$user_name]);
                $query_1->execute();
                $con = mysqli_connect("localhost","root","","flex");
                $sql = "SELECT * FROM `COURSE_INFO`";
                $sql2 = "SELECT * FROM `STUDENT_COURSE`";
	            $all_categories = mysqli_query($con,$sql);
	            $all_categories2 = mysqli_query($con,$sql2);

                
            // }
                
                // print_r($query_1);
                $result   = $query_1->fetchAll(PDO::FETCH_ASSOC);
                // print_r($result[9]["C_ID"]);

                $query = $conn->prepare("select C_ID from student_course where USERNAME = ?;"); 
                $query->execute([$user_name]);
                $result_C_ID  = $query->fetchAll(PDO::FETCH_ASSOC);
                // echo "COURSE: " .$result_C_ID[1]['C_ID'];

                ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Student Flex</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="./StudentPortal.php?">Home</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Course Information</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="./Students_Course.php">Course Registration</a>
                        </li>
                        <li>
                            <a href="./Registered_Course.php">Registered Courses</a>
                        </li>
                    </ul>
                </li>
                <li>
                <li>
                    <a href="./Students_Attendence.php">Attendence</a>
                </li>
                </li>
                <li>
                    <a href="./Students_Marks.php">Marks</a>
                </li>

                
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="./MainPage.html" >Log Out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            <h2>Course Registration Portal</h2>
            <div class="line"></div>
           
            <h3>Available Course</h3>
            
            <table class="table mt-3">
                <thead>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit Hours</th>

                </thead>
                <tbody>
                    
                    <?php
                        foreach ($result as $value){
                            
                            echo '<tr>
                            <td>'.$value["C_ID"].'</td>
                            <td>'.$value["C_NAME"].'</td>
                            <td>'.$value["CR_HOURS"].'</td>
                            </tr>';
                        }
                    ?>
                    
                    
                </tbody>
                
            </table>
            
            <form action="add_course.php" method="POST">
                
            <label>Select the course that you want to register</label>
            <select name="CoursesAdd">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
                
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
                        $i=0;
                foreach($result_C_ID as $val)
                {
                    if($val["C_ID"] == $category["C_ID"])
                    {
                        $i=1;
                        break;
                    }
                }
                if($i == 1)
                {
                    continue;
                }
			?>
				<option value="<?php echo $category["C_ID"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["C_ID"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated

			?>
		    </select>
        <br>
		<input type="submit" class = "btnsubmit" value="Register" name="submit">
        </form>


         <form action="Del_course.php" method="POST">
                
            <label>Select the course that you want to Drop</label>
            <select name="CoursesDel">
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category2 = mysqli_fetch_array(
						$all_categories2,MYSQLI_ASSOC)):;
                        if($category2["USERNAME"] != $user_name)
                        continue;

			?>
				<option value="<?php echo $category2["C_ID"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category2["C_ID"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated

			?>
		    </select>
        <br>
		<input type="submit" class="btndrop" value="Drop" name="submit">
        </form>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');    
            });
        });
    </script>
</body>

</html>