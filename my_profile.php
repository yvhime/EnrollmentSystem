<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['username']
    if (!isset($_SESSION['email_address'])) {
        header("Location: login.php");
    }

    //check query on profile image for reference on variable
    $studentIconID = $_SESSION['id'];
    $imageResult = mysqli_query($connect, "SELECT * FROM images WHERE student_id = '$studentIconID'"); //student_id = '$studentNumber'

    $viewStudentInfo = "SELECT * FROM users WHERE $studentIconID = id";
    $queryStudentInfo = mysqli_query($connect, $viewStudentInfo);

    while ($rowStudentInfo = mysqli_fetch_array($queryStudentInfo)) {
        $updatedStudentID = $rowStudentInfo['id'];
        $updatedStudentName = $rowStudentInfo['lastname'] . ", " . $rowStudentInfo['firstname'];
        $updatedEmailAddress = $rowStudentInfo['email_address'];
        $updatedPhoneNumber = $rowStudentInfo['phonenumber'];
        $updatedAddress = $rowStudentInfo['address'];
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

    <!-- css for profile image -->
    <link rel="stylesheet" href="css/">

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
                <a class="nav-link collapsed" href="grades.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>My Grades</span>
                </a>

                <a class="nav-link collapsed" href="subjectstaken.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Subjects Taken</span>
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['email_address']; ?>
                                </span>
                                <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->

                                    <?php
                                        while ($imageIconRow = mysqli_fetch_array($imageResult)) {
                                            if ($imageIconRow['profile_image'] == NULL) {
                                                echo "<img src='img/undraw_profile.svg' 
                                                    class='img-profile rounded-circle'>";
                                            } else {
                                                echo "<img src='img/".$imageIconRow['profile_image']."' 
                                                class='img-profile rounded-circle'>"; // show image
                                            }
                                            // echo "<img src='img/".$imageIconRow['profile_image']."' 
                                            // class='img-profile rounded-circle'>"; // show image
                                        }
                                    ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="my_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="changepassword.php">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
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
                    <h1 class="h3 mb-4 text-gray-800"></h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- prfile name -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Personal Information
                                        <?php //echo $_SESSION['lastname'] . ", " . $_SESSION['firstname'] ;?>
                                        <!-- <form action="editprofile.php" method="get">
                                            <input type='button' value='Edit Profile' class="btn btn-secondary btn-sm" 
                                            onclick="window.location = 'editprofile.php?studentnumber=<?php echo $_SESSION['id'];?> ' ">
                                        </form> -->
                                    </h6>
                                </div>
                                <div class="card-body">
                                <?php
                                    $studentID = $_SESSION["id"];
                                    $imageQuery = mysqli_query($connect, "SELECT * FROM images WHERE student_id = '$studentID'");

                                    while ($imageRow = mysqli_fetch_array($imageQuery)) {
                                        echo "<div id=''>";
                                        echo "<img src='img/".$imageRow['profile_image']."' id='imagePreview'>"; // show image
                                        //echo "<p>".$imageRow['path']."</p>"; // image path
                                        echo "lol";
                                        echo "</div>";

                                        $profileImageIcon = $imageRow['profile_image'];
                                    }
                                ?>
                                    <!-- <p>ID number: <?php echo $_SESSION['id'];?> </p>
                                    <p>Email address: <?php echo $_SESSION['email_address'];?> </p>
                                    <p>Phone number: <?php echo $_SESSION['phonenumber'];?> </p>
                                    <p>Gender: <?php echo $_SESSION['gender'];?> </p>
                                    <p>Birthday: <?php echo $_SESSION['birthday'];?> </p>
                                    <p>Address: <?php echo $_SESSION['address'];?> </p> -->
                                    <div class="form-group row">
                                        <label for="staticStudentID" class="col-sm-2 col-form-label">Student ID:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticStudentID" 
                                                    value="<?php echo $_SESSION['id'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticStudentName" class="col-sm-2 col-form-label">Student name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticStudentName" 
                                                    value="<?php echo $updatedStudentName;?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmailaddress" class="col-sm-2 col-form-label">Email address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmailaddress" 
                                                    value="<?php echo $updatedEmailAddress;?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticPhonenumber" class="col-sm-2 col-form-label">Phone number:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticPhonenumber" 
                                                    value="<?php echo $updatedPhoneNumber;?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticGender" class="col-sm-2 col-form-label">Gender:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticGender" 
                                                    value="<?php echo $_SESSION['gender'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticBirthday" class="col-sm-2 col-form-label">Birthday:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticBirthday" 
                                                    value="<?php echo $_SESSION['birthday'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticAddress" class="col-sm-2 col-form-label">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticAddress" 
                                                    value="<?php echo $updatedAddress;?>">
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        <!-- <input type="submit" class="btn btn-secondary btn-sm" 
                                            name="updatePersonalInfo" id="updatePersonalInfo" value="Edit Profile"> -->
                                        <form action="editprofile.php" method="get">
                                            <input type='button' value='Update Personal Information' class="btn btn-secondary btn-sm" 
                                            onclick="window.location = 'editprofile.php?studentnumber=<?php echo $_SESSION['id'];?> ' ">
                                        </form>
                                    </h6>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12">

                            <!-- college info -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        Student Information    
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                        // $programTable = "SELECT * FROM program";
                                        // $checkProgramTable = mysqli_query($connect, $programTable);
                                        // while ($rowsProgramTable = mysqli_fetch_array($checkProgramTable)) {
                                        //     $rowsProgramTable['id'];
                                        //     $rowsProgramTable['degree'];
                                        //     $rowsProgramTable['coursename'];
                                        // }
                                    ?>
                                    <!-- <p>Student Program: <?php echo $_SESSION['program'];?></p>
                                    <p>Year Level: <?php echo $_SESSION['yearlevel']; ?> </p>
                                    <p>Current Semester: <?php echo $_SESSION['semester'];?></p> -->
                                    <p>Max Units: </p>
                                    <p>Current Units: </p>
                                    <div class="form-group row">
                                        <label for="staticProgram" class="col-sm-2 col-form-label">Student program:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticProgram" 
                                                    value="<?php echo $_SESSION['program'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticYearLevel" class="col-sm-2 col-form-label">Year level:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticYearLevel" 
                                                    value="<?php echo $_SESSION['yearlevel'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticSemester" class="col-sm-2 col-form-label">Current Semester:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticSemester" 
                                                    value="<?php echo $_SESSION['semester'];?>">
                                            </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="staticProgram" class="col-sm-2 col-form-label">Student program:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticProgram" 
                                                    value="<?php echo $_SESSION['program'];?>">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticProgram" class="col-sm-2 col-form-label">Student program:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticProgram" 
                                                    value="<?php echo $_SESSION['program'];?>">
                                            </div>
                                    </div> -->
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