<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Academics | Portal</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

    </head>
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
                $query_1 = $conn->prepare("Select * from Teacher;"); 
                $query_1->execute();

                $result  = $query_1->fetchAll(PDO::FETCH_ASSOC);
                
                ?>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Academics Flex</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Course</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="./Academics_course.php">Course Add/Remove</a>
                        </li>
                        <li>
                            <a href="./Offered_courses.php">Offered Courses</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Admission</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#page" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Students</a>
                            <ul class="collapse list-unstyled" id="page">
                                <li>
                                <em><a href="Add_del_Students.php">Add/Drop Students</a></em>
                                </li>
                                <li>
                                    <em><a href="Show_Students.php">Students Information</a></em>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#page2" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Faculty</a>
                            <ul class="collapse list-unstyled" id="page2">
                                <li>
                                <em><a href="Add_del_Faculty.php">Add/Drop Faculty</a></em>
                                </li>
                                <li>
                                    <em><a href="Show_Faculty.php">Faculty Information</a></em>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="/FLEX/sidebar/MainPage.html" class="article">Log Out</a>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <h2>Faculty Information</h2>
            <div class="line"></div>
            <?php
            foreach ($result as $value){
                ?>
            <table class="table mt-3">
                <thead>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                </thead>
                <tbody>
                    <?php
                        
                            echo '<tr>
                            <td>'.$value["NAME"].'</td>
                            <td>'.$value["MOBILE_NO"].'</td>
                            <td>'.$value["GENDER"].'</td>
                            <td>'.$value["DOB"].'</td>
                            </tr>';
                        ?>
                </tbody>
            </table>

            <table class="table mt-3">
                <thead>
                    <th>Department</th>
                    <th>CGPA in Bachelors</th>
                    <th>CPGA in Masters</th>
                    <th>University</th>
                </thead>
                <tbody>
                    <?php
                        
                            echo '<tr>
                            <td>'.$value["DEPARTMENT"].'</td>
                            <td>'.$value["BS_GPA"].'</td>
                            <td>'.$value["MS_GPA"].'</td>
                            <td>'.$value["University"].'</td>
                            </tr>';
                        ?>
                </tbody>
            </table>
            <div class="line"></div>

            <?php
            }
            ?>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>