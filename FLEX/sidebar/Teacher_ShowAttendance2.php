<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Faculty | Flex</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style>
    .GoBackbtn {
    margin-bottom: 2%;
    border: none;
    border-radius: 0.4rem;
    /* padding: 0.3%; */
    background: #0471dd;
    color: #fff;
    font-weight: 600;
    width: fit-content;
    cursor: pointer;
    font-size: 1.3vw; */
}

.GoBackbtn:hover {
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
                // $date = $_POST['Date'];
                $course = $_POST['CoursesAdd'];
                // echo "Session Variable: " .$_SESSION["Username"];
                // $Search = $_GET["user_name"];
                // $user_name = $_GET['U'];
                $query_0 = $conn->prepare("select DISTINCT(date) from attendance where C_ID = ? AND T_ID = ? ORDER BY DATE DESC");
                $query_0->execute([$course, $user_name]);
                $result_date =  $query_0->fetchAll(PDO::FETCH_ASSOC);
                // print_r($result_date[1]['date']);
                // $con = mysqli_connect("localhost","root","","flex");
                // $sql = "SELECT * FROM `COURSE_INFO`";
	            // $all_categories = mysqli_query($con,$sql);
            // }
                
                // print_r($query_1);
                // print_r(count($result_date))
                ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Faculty Flex</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="./TeacherPortal.php">Home</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Course Information</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="./Teachers_Course.php">Course Registration</a>
                        </li>
                        <li>
                            <a href="./Teacher_Registered.php">Registered Courses</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./Teacher_Marking.php">Manage Marking</a>
                </li>
                 <li>
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="./Teacher_Attendance.php">Manage Attendance</a>
                        </li>
                        <li>
                            <a href="./Teacher_ShowAttendance.php">Show Attendance</a>
                        </li>
                    </ul>
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
            
            <!-- Page Content -->
            <h2>Attendance Sheet</h2>
            <div class="line"></div>
            <?php
            $temp = 0;
            while($temp < count($result_date))
            {
            $query_1 = $conn->prepare("select USERNAME, NAME, Batch, Degree, Attendance from student NATURAL JOIN ATTENDANCE where C_ID = ? AND Date = ? AND T_ID = ? ORDER BY DATE;"); 
            $query_1->execute([$course, $result_date[$temp]['date'], $user_name]);
            $result   = $query_1->fetchAll(PDO::FETCH_ASSOC);

            echo '<table class="table mt-3">

                <thead>
                    <th>Date: '.$result_date[$temp]['date'].'</th>
                    <th>Roll-No</th>
                    <th>Student Name</th>
                    <th>Present/Absent</th>

                </thead>
                <tbody>';
                foreach($result as $val)
                {
                    echo '<tr>
                    <td></td>
                    <td>'.$val["USERNAME"].'</td>
                    <td>'.$val["NAME"].'</td>
                    <td>'.$val["Attendance"].'</td>
                    </tr>';
                    echo '</tbody>';
                }

            $temp++;
            }
            
            ?>   
                
                
            </table>
            <button name= "GoBackbtn" class = "GoBackbtn"><a href="./Teacher_ShowAttendance.php">Go Back</a></button>
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