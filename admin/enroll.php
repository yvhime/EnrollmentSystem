<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['username']
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    if (isset($_POST['enroll'])) {
        $selectedProgram = $_POST['course'];
        $studentNumberHere = $_GET['studentnumber'];
        $yearLevel = $_POST['yearLevel'];
        $semester = $_POST['semester'];
        // echo $studentNumberHere;
        // echo $selectedProgram;
        // echo $yearLevel;
        // echo $semester;

        $checkDuplicate = mysqli_query($connect, "SELECT * FROM users WHERE {$studentNumberHere} = id");
        $rowCheck = mysqli_num_rows($checkDuplicate);

        // if ($rowCheck > 0) {
            //echo "<script>alert('Username already exists. Choose a new one.')</script>";
            //i think for UPDATE clause, comma "," is used over "AND"
            
            /*$enrollToProgram = mysqli_query($connect, "UPDATE users SET program = '".$selectedProgram."',
                yearlevel = '".$yearLevel."', semester = '".$semester."' WHERE {$studentNumberHere} = id ");*/

            $enrollToProgram = "UPDATE users SET program = '".$selectedProgram."',
                yearlevel = '".$yearLevel."', semester = '".$semester."' WHERE {$studentNumberHere} = id";

            if (mysqli_query($connect, $enrollToProgram)) {
                echo "<script> alert('Student successfully enrolled.'); </script>";
                echo "<script> window.location='viewstudents.php' </script>";
            }

        // } else {
        //     $enrollToProgram = mysqli_query($connect, "INSERT INTO users (program) VALUES ('$selectedProgram') ");
            
        // }
    }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lorem Ipsum Colleges</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">

                <a class="nav-link collapsed" href="viewstudents.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>View Students</span>
                </a>

                <a class="nav-link collapsed" href="viewprograms.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>View All Programs</span>
                </a>

                <a class="nav-link collapsed" href="addprogram.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add New Program</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['username'];?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Enroll Student</h1>

                    <div class="row">

                        <div class="col-lg-5">

                            <!-- prfile name -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        </h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                    <!-- studentnumber inside $_GET is the same as studentnumber in viewstudents.php // use $_GET  -->
                                    <?php
                                        $studentNumber = $_GET['studentnumber'];
                                        $studentInfoSql = "SELECT * FROM users WHERE {$studentNumber} = id ";
                                        $studentResult = mysqli_query($connect, $studentInfoSql);

                                        while ($rowResult = mysqli_fetch_array($studentResult)) {
                                            $id = $rowResult["id"];
                                            $firstName= $rowResult["firstname"];
                                            $lastName = $rowResult["lastname"];
                                            $emailAddress = $rowResult["email_address"];
                                    ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Student Name:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $rowResult["lastname"] . ", " . $rowResult["firstname"]; ?>" 
                                            placeholder="" name="" id="" readonly>
                                    </div>
                                    <?php
                                            // echo "Full name: " . $rowResult["lastname"] . ", " . $rowResult["firstname"];
                                        }
                                        
                                    ?>

                                    <!-- <p>ID number: <?php echo $studentNumber ?> </p> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">ID:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $studentNumber ?>" placeholder="" name="" id="" readonly>
                                    </div>

                                    <select name="degree" id="degree" class="form-control form-control-user">
                                        
                                    </select>
                                    <?php

                                    ?>

                                    <!-- ORIGINAL CODES -->

                                    <!-- <p>Enroll to:  -->

                                    <!-- dropdown menus coming from database -->
                                    <!-- <select name="course" id="course" class="form-control form-control-user"> -->
                                    <?php
                                        // $courseList = "SELECT * FROM program";
                                        // $courseListResult = mysqli_query($connect, $courseList);

                                        // while ($courseRow = mysqli_fetch_array($courseListResult)) {
                                        //     echo "<option value='". $courseRow['coursename'] ."' >" . $courseRow['coursename'] . "</option>";
                                        // }
                                    ?>
                                    <!-- </select></p> -->

                                    <!-- ORIGINAL CODES -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="course">Enroll to:</label>
                                        </div>
                                        <select class="custom-select" id="course" name="course">
                                            <option selected>...</option>
                                        <?php
                                            $courseList = "SELECT * FROM program";
                                            $courseListResult = mysqli_query($connect, $courseList);

                                            while ($courseRow = mysqli_fetch_array($courseListResult)) {
                                                echo "<option value='". $courseRow['coursename'] ."' >" . $courseRow['coursename'] . "</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>

                        
                                    <!-- ORIGINAL CODES -->        
                                    <!-- Year Level: 
                                    <select name="yearLevel" id="yearLevel" class="form-control form-control-user">
                                        <option value="First Year">First Year</option>
                                        <option value="Second Year">Second Year</option>
                                        <option value="Third Year">Third Year</option>
                                        <option value="Fourth Year">Fourth Year</option>
                                    </select>
                                    <br> -->
                                    <!-- ORIGINAL CODES -->  
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="yearLevel">Year Level:</label>
                                        </div>
                                        <select class="custom-select" id="yearLevel" name="yearLevel">
                                            <option selected>...</option>
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                            <option value="Fourth Year">Fourth Year</option>
                                        </select>
                                    </div>

                                    <!-- ORIGINAL CODES --> 
                                    <!-- Semester: 
                                    <select name="semester" id="semester" class="form-control form-control-user">
                                        <option value="First Semester">First Semester</option>
                                        <option value="Second Semester">Second Semester</option>
                                    </select>
                                    <br> -->
                                    <!-- ORIGINAL CODES --> 

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="semester">Semester:</label>
                                        </div>
                                        <select class="custom-select" id="semester" name="semester">
                                            <option selected>...</option>
                                            <option value="First Semester">First Semester</option>
                                            <option value="Second Semester">Second Semester</option>
                                        </select>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="enroll" id="enroll" value="Enroll Student">
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>
                            Copyright &copy; Silvestre, November 2020 - <?php echo date("F") . " " . date("Y"); ?>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>