<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connection.php");
//can use _POST or _REQUEST / _SESSION DOESNT WORK FOR SOME REASONS ON ISSET LOGIN 

// //to pass values by session
// if(isset($_REQUEST['login'])) {
//     $user_name = $_POST['username'];
//     $sql_user = mysqli_query($connect, "SELECT * FROM admin WHERE username = '".$user_name."' ");
//     $sql_row = mysqli_fetch_array($sql_user);

//     if($sql_row > 0) {
//         $_SESSION['id'] = $sql_row['id'];
//         $_SESSION['username'] = $sql_row['username'];
//         $_SESSION['firstname'] = $sql_row['firstname'];
//         $_SESSION['lastname'] = $sql_row['lastname'];
//         $_SESSION['password'] = $sql_row['password'];
//         $_SESSION['emailaddress'] = $sql_row['emailaddress'];
//         $_SESSION['phonenumber'] = $sql_row['phonenumber'];
//         //echo "<script>window.location = 'index.php'</script>";
//     }
// }
// //to pass values by session

// //code for logging in
// //check whether the variable is empty
// //or is set/declared
// if(isset($_POST['username'])) {
//     $user_name = $_POST['username'];
//     $pass_word = $_POST['pass_word'];
//     $result = "SELECT * FROM admin WHERE username = '".$user_name."' AND password = '".$pass_word."' ";
//     //$connect came from include("connection.php");
//     //always put mysqli/connect first
//     $sql_info = mysqli_query($connect, $result);
//     //i think == 1 and > 0 is the same
//     //i think using mysqlinumrows checks if there is a
//     //value stored in db not sure
//     if(mysqli_num_rows($sql_info) > 0) {
//         //echo "<script>alert('Success!')</script>";
//         echo "<script>window.location = 'index.php'</script>";
//     }
//     else {
//         echo "<script>alert('Fail!')</script>";
//     }
// }

//--------------------------------------------------------------------------------

//to pass values by session
// if(isset($_REQUEST['login'])) {
//     $emailAddress = $_POST['emailAddress'];
//     $sql_user = mysqli_query($connect, "SELECT * FROM admin WHERE emailaddress = '".$emailAddress."' ");
//     $sql_row = mysqli_fetch_array($sql_user);

//     if($sql_row > 0) {
//         $_SESSION['id'] = $sql_row['id'];
//         $_SESSION['username'] = $sql_row['username'];
//         $_SESSION['firstname'] = $sql_row['firstname'];
//         $_SESSION['lastname'] = $sql_row['lastname'];
//         $_SESSION['password'] = $sql_row['password'];
//         $_SESSION['emailaddress'] = $sql_row['emailaddress'];
//         $_SESSION['phonenumber'] = $sql_row['phonenumber'];
//         //echo "<script>window.location = 'index.php'</script>";
//     }
// }
//to pass values by session

//code for logging in
//check whether the variable is empty
//or is set/declared
// if(isset($_POST['emailAddress'])) {
//     $emailAddress = $_POST['emailAddress'];
//     $pass_word = $_POST['pass_word'];
//     $result = "SELECT * FROM admin WHERE emailaddress = '".$emailAddress."' AND password = '".$pass_word."' ";
//     //$connect came from include("connection.php");
//     //always put mysqli/connect first
//     $sql_info = mysqli_query($connect, $result);
//     //i think == 1 and > 0 is the same
//     //i think using mysqlinumrows checks if there is a
//     //value stored in db not sure
//     if(mysqli_num_rows($sql_info) > 0) {
//         //echo "<script>alert('Success!')</script>";
//         echo "<script>window.location = 'index.php'</script>";
//     }
//     else {
//         echo "<script>alert('Fail!')</script>";
//     }
// }

//--------------------------------------------------------------------------------

$email_address = ""; //putting a non value

if(isset($_REQUEST['login'])) {

    $email_address = $_POST['emailAddress'];
    $sql_user = mysqli_query($connect, "SELECT * FROM admin WHERE emailaddress = '" . $email_address . "' ");
    $sql_row = mysqli_fetch_array($sql_user);

    if($sql_row > 0) {
        $_SESSION['id'] = $sql_row['id'];
        $_SESSION['firstname'] = $sql_row['firstname'];
        $_SESSION['lastname'] = $sql_row['lastname'];
        $_SESSION['email_address'] = $sql_row['emailaddress'];
        $_SESSION['password'] = $sql_row['password'];
        $_SESSION['phonenumber'] = $sql_row['phonenumber'];
        //echo $_SESSION['id'] . " " . $_SESSION['email_address'] . " " . $_SESSION['password'];
    }
}

if(isset($_POST['login'])) { // email_address used for logging in

    $emailAddress = mysqli_real_escape_string($connect, $_POST["emailAddress"]);  
    $password = mysqli_real_escape_string($connect, $_POST["pass_word"]);  
    $query = "SELECT * FROM admin WHERE emailaddress = '".$emailAddress."'";  
    $result = mysqli_query($connect, $query); 

    if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result)) {  
            if(password_verify($password, $row["password"])) {  
                //return true;  
                $_SESSION["email_address"] = $emailAddress;  
                header("location:index.php");  
                //echo "success";
            } else {  
                //return false;  
                //echo "fail";
                echo '<script>alert("The password you’ve entered is incorrect.")</script>';  
            }  
        }  
    } else {  
        echo '<script>alert("The email address you’ve entered is not registered.")</script>';  
    }

}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lorem Ipsum Colleges</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> PUG IMAGE -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                                    </div>
                                    <!-- <form class="user"> -->
                                        <form method="POST" action="login.php">
                                        <div class="form-group">
                                            <!-- enter email address -->
                                            <input type="text" class="form-control form-control-user" name="emailAddress" 
                                                id="emailAddress" aria-describedby="emailHelp"
                                                placeholder="Email address">
                                        </div>

                                        <!-- password ui -->
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" aria-label="Text input with checkbox"
                                                placeholder="Password" name="pass_word" id="pass_word">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" aria-label="Checkbox for following text input"
                                                        id="showPass" onclick="showPassword()">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- password ui -->

                                        <!-- login button -->
                                        <input type="submit" name="login" id="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        </form>
                                    <!-- </form> -->
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="createnewaccount.php">Create New Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white fixed-bottom">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>
                    Copyright &copy; Silvestre, November 2020 - <?php echo date("F") . " " . date("Y"); ?>
                </span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function showPassword() {
            var passWord = document.getElementById("pass_word");
            
            if (passWord.type === "password") {
                passWord.type = "text";
            } else {
                passWord.type = "password";
            }
        }
    </script>

</body>

</html>