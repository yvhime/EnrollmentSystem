<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['username']
    if (!isset($_SESSION['email_address'])) {
        header("Location: login.php");
    }

    //code for changing password
    //echo "string";
    // if (isset($_REQUEST['savePasswordChange'])) {
    //     $userQuery = mysqli_query($connect, "SELECT * FROM users WHERE email_address = '".$_SESSION['email_address']."' AND password = '".$_REQUEST['currentPassword']."' ");

    //     $userRowInfo = mysqli_num_rows($userQuery);

    //     if ($userRowInfo > 0) {
    //         if ($_REQUEST['newPassword'] == $_REQUEST['reNewPassword']) {
    //             $userChangePass = mysqli_query($connect, "UPDATE users SET password = '".$_REQUEST['newPassword']."' WHERE email_address = '".$_SESSION['email_address']."' ");
    //             echo "pw: " . $_REQUEST['newPassword'] . "retype: " . $_REQUEST['reNewPassword'];
    //             echo "<script> alert('Password changed.') </script>";
    //             //echo "<script> window.location = '' </script>";
    //         } else {
    //             echo "<script> alert('Password input does not match.') </script>";
    //         }

    //     if ($_REQUEST['currentPassword'] != "") {
    //         echo "<script>alert('pota')</script>";
    //     } else {
    //         echo "<script>alert('All Input Fields are required!')</script>";
    //     } 

    //     }
    // }

    //set query
    $passwordStudentID = $_SESSION['id'];
    //pass the id to the variable
    $currentPasswordQuery = mysqli_query($connect, "SELECT * FROM users WHERE id = '$passwordStudentID'");
    while ($rowCurrentPasswordQuery = mysqli_fetch_array($currentPasswordQuery)) {
        $oldPasswordOfStudent = $rowCurrentPasswordQuery['password'];
        //echo "old pass encrypted: " . $oldPasswordOfStudent . "<br>";
    //get the encrypted pw from db
    }
    //set query

    //when save changes button is clicked
    $currentPassword = "";
    if (isset($_POST['savePasswordChange'])) {
        //set variables
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $reNewPassword = $_POST['reNewPassword'];
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        //echo "current pass entered: " . $currentPassword .  "<br>";
        //echo "new pass entered: " . $newPassword . " encrypted: " . $newPasswordHash . "<br>";
        //echo "retyped pass entered: " . $reNewPassword . "<br>";

        //changes today = validation -----------------
        if ($currentPassword != NULL) {
            //echo "current pass entered: " . $currentPassword . "<br>";
            if ($newPassword != NULL) {
                //echo "you have entered your new password.<br>";
                if ($reNewPassword != NULL) {
                    //echo "you have entered your new password AGAIN.<br>";
                    if ($newPassword == $reNewPassword) {
                        //echo "your new pass and retyped pass matched<br>";
                        //if new and retyped pw match
                        if (password_verify($currentPassword, $oldPasswordOfStudent)) {
                            //first parameter is the current pw entered by the user-raw
                            //second parameter is the old pw of student written in db-encrypted
                            //echo "current pw typed matched with pw in db";
                            $changePasswordQuery = mysqli_query($connect, "UPDATE users 
                                SET password = '".$newPasswordHash."'
                                WHERE $passwordStudentID = id "); 
                            echo "<script>alert('Password successfully changed.')</script>";
                        } else {
                            echo "<script>alert('Incorrect current password.')</script>";
                        }
                    } else {
                        echo "<script>alert('Passwords do not match.')</script>";
                    }
                } else {
                    echo "<script>alert('Enter your new password again.')</script>";
                }
            } else {
                echo "<script>alert('Enter your new password.')</script>";
            }
        } else {
            echo "<script>alert('Enter your current password.')</script>";
        }
        //changes today = validation -----------------
    }
    //when save changes button is clicked

    //trial for matching password
    // if (password_verify($currentPassword, $oldPasswordOfStudent)) {
    //     echo "-------password match compared to 'entered current password'<br>";
    // } else {
    //     echo "-------password does not match compared to 'entered current password'<br>";
    // }
    //trial for matching password

    //query for topright profile icon
    $studentIconID = $_SESSION['id'];
    $imageResult = mysqli_query($connect, "SELECT * FROM images WHERE student_id = '$studentIconID'"); //student_id = '$studentNumber'
    $imageProfileImage = "";
    while ($rowImageQuery = mysqli_fetch_array($imageResult)) {
        $imageID = $rowImageQuery['id'];
        $imageProfileImage = $rowImageQuery['profile_image'];
        $imagePathImage = $rowImageQuery['path'];
        $imageStudentID = $rowImageQuery['student_id'];
        //echo $imageID.$imageProfileImage.$imagePathImage.$imageStudentID;
    }
    //query for topright profile icon


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

            <!-- Nav Item - Utilities Collapse Menu -->
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
                                //top right profile icon
                                    if ($imageProfileImage == NULL) {
                                        echo "<img src='img/undraw_profile.svg' 
                                        class='img-profile rounded-circle'>";
                                    } else {
                                        echo "<img src='img/".$imageProfileImage."' 
                                        class='img-profile rounded-circle'>"; // show image
                                    }
                                //top right profile icon
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
                                <a class="dropdown-item" href="logout.php" >
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
                    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

                    <div class="row">

                        <div class="col-lg-5">

                            <!-- change password section -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        Choose a strong password</h6>
                                </div>
                                <form method="POST" action="changepassword.php">
                                    <div class="card-body">
                                        <!-- change password input and save changes button -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Current password:</span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="" name="currentPassword" id="">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">New password:</span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="" name="newPassword" id="">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Re-type new password:</span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="" name="reNewPassword" id="">
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="savePasswordChange" id="savePasswordChange" value="Save changes">
                                        <!-- change password input and save changes button -->
                                    </div>
                                </form>
                            </div>
                            <!-- change password section -->

                        </div>

                        <div class="col-lg-7">

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