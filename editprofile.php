<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['username']
    if (!isset($_SESSION['email_address'])) {
        header("Location: login.php");
    }

    //profile icon codes
    $studentNumber = $_GET['studentnumber'];
    $imageResult = mysqli_query($connect, "SELECT * FROM images WHERE student_id = '$studentNumber'"); //student_id = '$studentNumber'
    $imageProfileImage = "";
    while ($rowImageQuery = mysqli_fetch_array($imageResult)) {
        $imageID = $rowImageQuery['id'];
        $imageProfileImage = $rowImageQuery['profile_image'];
        $imagePathImage = $rowImageQuery['path'];
        $imageStudentID = $rowImageQuery['student_id'];
        //echo $imageID.$imageProfileImage.$imagePathImage.$imageStudentID;
    }
    //profile icon codes

    //uploading profile picture for the user codes
    // Initialize message variable
    $msg = "";
    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
        // Get image name
        $image = $_FILES['profileImage']['name'];
        // Get text
        //$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

        // image file directory
        $imagePath = "img/".basename($image);

        if ($image != NULL) {
            if ($imageProfileImage == NULL) {
                $sqlUploadInsert = "INSERT INTO images (profile_image, path, student_id) VALUES ('$image', '$imagePath', '$studentNumber')";
                // execute query
                mysqli_query($connect, $sqlUploadInsert);

                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $imagePath)) {
                    $msg = "Image uploaded successfully";
                }else{
                    $msg = "Failed to upload image";
                }
                echo "<script>alert('Profile picture successfully uploaded.');</script>";
            } else {
                $sqlUploadUpdate = "UPDATE images SET profile_image = '".$image."',
                    path = '".$imagePath."',
                    student_id = '".$studentNumber."'
                    WHERE $studentNumber = student_id";

                // execute query
                mysqli_query($connect, $sqlUploadUpdate);

                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $imagePath)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
                echo "<script>alert('Profile picture successfully updated.');</script>";
            }
        }
        else {
            echo "<script>alert('Select your profile picture.');</script>";
        }


        // $sql = "INSERT INTO images (profile_image, path, student_id) VALUES ('$image', '$imagePath', '$studentNumber')";
        // // execute query
        // mysqli_query($connect, $sql);

        // if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $imagePath)) {
        //     $msg = "Image uploaded successfully";
        // }else{
        //     $msg = "Failed to upload image";
        // }

        //-------------------------------------------------------------------
        // if ($studentNumber == NULL) {
        //     $sqlUploadInsert = "INSERT INTO images (profile_image, path, student_id) 
        //         VALUES ('$image', '$imagePath', '$studentNumber')";
        //     // execute query
        //     mysqli_query($connect, $sqlUploadInsert);

        //     if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $imagePath)) {
        //         $msg = "Image uploaded successfully";
        //     } else {
        //         $msg = "Failed to upload image";
        //     }

        // } 
        // else {
        //     $sqlUploadUpdate = "UPDATE images SET profile_image = '".$image."',
        //         path = '".$imagePath."',
        //         student_id = '".$studentNumber."'
        //         WHERE $studentNumber = student_id";

        //     // execute query
        //     mysqli_query($connect, $sqlUploadUpdate);

        //     if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $imagePath)) {
        //         $msg = "Image uploaded successfully";
        //     } else {
        //         $msg = "Failed to upload image";
        //     }
        // }
        //-------------------------------------------------------------------
    }
    //uploading profile picture for the user codes

    //update personal info
    $studentInfoID = $_SESSION['id'];
    if (isset($_POST['updatePersonalInfo'])) {
        $updateEmailAddress = $_POST['updateEmailAddress'];
        $updatePhoneNumber = $_POST['updatePhoneNumber'];
        $updateAddress = $_POST['updateAddress'];
        //echo $updateEmailAddress . $updatePhoneNumber . $updateAddress;

        

        $updateStudentInfo = mysqli_query($connect, "UPDATE users SET 
            email_address = '".$updateEmailAddress."',
            phonenumber = '".$updatePhoneNumber."',
            address = '".$updateAddress."'
            WHERE $studentInfoID = id");

        echo "<script> alert('Personal information updated.'); </script>";
        echo "<script> window.location='my_profile.php' </script>";
    }

    $viewStudentInfo = "SELECT * FROM users WHERE $studentInfoID = id";
    $queryStudentInfo = mysqli_query($connect, $viewStudentInfo);

    while ($rowStudentInfo = mysqli_fetch_array($queryStudentInfo)) {
        $updatedEmailAddress = $rowStudentInfo['email_address'];
        $updatedPhoneNumber = $rowStudentInfo['phonenumber'];
        $updatedAddress = $rowStudentInfo['address'];
    }
    //update personal info
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
    <link href="css/profileimage.css" rel="stylesheet">

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
                                    src="img/<?php $profileImageIcon; ?>"> -->

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

                    <div class="col-lg-4">

                        <!-- profile picture section/preview -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> 
                                    Profile Picture    
                                </h6>
                            </div>
                            <div class="card-body">
                                <!-- section for picture -->
                                <!-- <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg"> -->
                                <?php
                                //section for picture
                                    if ($imageProfileImage == NULL) {
                                        echo "<img src='img/undraw_profile.svg' 
                                        class='img-profile rounded-circle'>";
                                    } else {
                                        echo "<img src='img/".$imageProfileImage."' 
                                        class='img-profile rounded-circle'>"; // show image
                                    }
                                //section for picture
                                ?>
                                <!-- section for picture -->
                            </div>
                            <div class="card-footer py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="size" value="1000000">
                                        <input type="file" name="profileImage" class="">
                                        <input type="submit" name="upload" value="Update" class="btn btn-secondary btn-sm">
                                    </form>
                                    </div>
                                </h6>
                            </div>
                        </div>
                        <!-- profile picture section/preview -->

                    </div>

                        <div class="col-lg-8">

                            <!-- personal info section -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        Student ID: <?php echo $_SESSION['id'];?>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                        while ($imageRow = mysqli_fetch_array($imageResult)) {
                                            echo "<div id='img_div'>";
                                            echo "<img src='img/".$imageRow['profile_image']."' >"; // show image
                                            //echo "<p>".$imageRow['path']."</p>"; // image path
                                            echo "</div>";

                                            $profileImageIcon = $imageRow['profile_image'];
                                        }
                                    ?>
                                    
                                    <!-- <div class="form-group row">
                                        <label for="staticStudentID" class="col-sm-2 col-form-label">Student ID:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticStudentID" 
                                                    value="<?php echo $_SESSION['id'];?>">
                                            </div>
                                    </div> -->

                                <form action="" method="POST">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Email address:</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="" 
                                            value="<?php echo $updatedEmailAddress ?>" name="updateEmailAddress" id="updateEmailAddress">
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="staticEmailaddress" class="col-sm-2 col-form-label">Email address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmailaddress" 
                                                    value="<?php echo $_SESSION['email_address'];?>">
                                            </div>
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Phone number:</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="" 
                                            value="<?php echo $updatedPhoneNumber; ?>" name="updatePhoneNumber" id="updatePhoneNumber">
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="staticPhonenumber" class="col-sm-2 col-form-label">Phone number:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticPhonenumber" 
                                                    value="<?php echo $_SESSION['phonenumber'];?>">
                                            </div>
                                    </div> -->

                                    <!-- <div class="form-group row">
                                        <label for="staticGender" class="col-sm-2 col-form-label">Gender:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticGender" 
                                                    value="<?php echo $_SESSION['gender'];?>">
                                            </div>
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Address:</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="" 
                                            value="<?php echo $updatedAddress; ?>" name="updateAddress" id="updateAddress">
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="staticAddress" class="col-sm-2 col-form-label">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticAddress" 
                                                    value="<?php echo $_SESSION['address'];?>">
                                            </div>
                                    </div> -->
                                    
                                </div>
                                <div class="card-footer py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> 
                                        <input type="submit" class="btn btn-secondary btn-sm" 
                                            name="updatePersonalInfo" id="updatePersonalInfo" value="Update">
                                </form>
                                        <input type="submit" class="btn btn-secondary btn-sm" 
                                            name="cancelEdit" id="cancelEdit" value="Cancel" 
                                            onclick="window.location = 'my_profile.php'">
                                    </h6>
                                </div>
                                
                            </div>
                            <!-- personal info section -->
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