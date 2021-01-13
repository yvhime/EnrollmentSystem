<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connection.php");

$firstname = "";
$lastname = "";
$phonenumber = "";
$email_address = "";
$gender = "Gender (Optional)";
$birthday = "";
$address = "";

if(isset($_POST['createaccount'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    //$username = $_POST['username'];
    $email_address = $_POST['email_address'];
    $pass_word = $_POST['pass_word'];
    $phonenumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $passwordRaw = $_POST['pass_word']; //trial
    $passwordHash = password_hash($passwordRaw, PASSWORD_DEFAULT); //trial
    $repeatPassword = $_POST['repeatPassword'];
    // echo "pw: " . $passwordRaw . "<br>";
    // echo "repeat pw: " . $repeatPassword . "<br>";
    //echo $passwordHash;
    // to check if it works
    // echo $firstname . "<br>";
    // echo $lastname . "<br>";
    // echo $username . "<br>";
    // echo $email_address . "<br>";
    // echo $pass_word . "<br>";
    // echo $phonenumber . "<br>";
    // echo $gender . "<br>";
    // echo $birthday . "<br>";
    // echo $address . "<br>";

    // if ($passwordRaw == $repeatPassword) {
    //     echo "<br>password match";
    // } else {
    //     echo "<br>password not matched";
    // }

    //to check if passwords match
    if ($passwordRaw == $repeatPassword) {
        //check whether there is a duplicate username
        $check_duplicate = mysqli_query($connect, "SELECT id FROM users WHERE email_address = '$email_address' ");
        $row = mysqli_num_rows($check_duplicate);

        if($row > 0) {
            echo "<script>alert('Username already exists. Choose a new one.')</script>";    
        } 
        //insert acc info to database redirect to index.php
        //$passwordHash trial
        else {
            $input_account = mysqli_query($connect, "INSERT INTO users (firstname, lastname, email_address, password, phonenumber, gender, birthday, address) VALUES ('$firstname', '$lastname', '$email_address', '$passwordHash', '$phonenumber', '$gender', '$birthday', '$address') ");
            echo "<script>alert('Create new account success.')</script>";
            echo "<script> window.location='login.php' </script>";
        }
    } else {
        echo "<script> alert('Passwords does not match.') </script>";
    }

}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOREM IPSUM</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- <body class="bg-gradient-primary"> -->
<body class="">
    <!-- <div class="row justify-content-center"> -->
    <!-- <div class="container">
        <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0"> -->
                <!-- Nested Row within Card Body -->
                <!-- <div class="row"> -->
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>PUG IMAGE -->
                    <!-- <div class="col-lg-12">
                        <div class="p-5"> -->
                            <!-- <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create New Account</h1>
                            </div> -->
                            <!-- <form class="user"> -->
                            <!-- <form method="POST" action="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 form-outline"> -->
                                        <!-- firstname -->
                                        <!-- <input type="text" class="form-control form-control-user" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname ?>">
                                    </div>
                                    <div class="col-sm-6"> -->
                                        <!-- lastname -->
                                        <!-- <input type="text" class="form-control form-control-user" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname ?>">
                                    </div>
                                </div> -->

                                <!-- <div class="form-group row"> -->
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <!-- username -->
                                        <!-- <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username"> -->
                                    <!-- </div> -->
                                    
                                    <!-- <div class="col-sm-6"> -->
                                        <!-- phonenumber -->
                                        <!-- <input type="text" class="form-control form-control-user" name="phonenumber" id="phonenumber" placeholder="Phone number" value="<?php echo $phonenumber ?>">
                                    </div>
                                </div>

                                <div class="form-group"> -->
                                    <!-- email add -->
                                    <!-- <input type="email" class="form-control form-control-user" name="email_address" id="email_address" placeholder="Email Address" value="<?php echo $email_address ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <!-- password -->
                                        <!-- <input type="password" class="form-control form-control-user" name="pass_word" id="pass_word" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6"> -->
                                        <!-- repeat password -->
                                        <!-- <input type="password" class="form-control form-control-user" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password">
                                    </div>                           
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <!-- gender -->
                                        <!-- <input type="text" class="form-control form-control-user" name="gender" id="gender" placeholder="Gender"> -->
                                        <!-- <select name="gender" id="gender" class="form-control form-control-user">
                                            <option disabled="">Gender</option>
                                            <option <?php if($gender == "Male") echo "selected"; ?> value="Male">
                                                Male</option>
                                            <option <?php if($gender == "Female") echo "selected"; ?> value="Female">
                                                Female</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6"> -->
                                        <!-- birthday -->
                                        <!-- <input type="date" class="form-control form-control-user" name="birthday" 
                                            id="birthday" placeholder="Birthday" value="<?php echo $birthday ?>">
                                    </div>                           
                                </div>

                                <div class="form-group"> -->
                                    <!-- address -->
                                    <!-- <input type="text" class="form-control form-control-user" name="address" id="address" placeholder="Address" value="<?php echo $address ?>">
                                </div> -->

                                <!-- create acc button -->
                                <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="createaccount" id="createaccount" value="Create Account">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div> -->
                        <!-- </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--</div>--> <!-- HERE -->
    <!-- </div> 94 186 -->
    <!-- </div> HERE AGAIN -->

    <!-- --------------------------------------------- -->

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
                                        <h1 class="h4 text-gray-900 mb-4">Create New Account</h1>
                                    </div>
                                    <!-- <form class="user"> -->
                                    <form method="POST" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0 form-outline">
                                                <!-- firstname -->
                                                <input type="text" class="form-control form-control-user" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- lastname -->
                                                <input type="text" class="form-control form-control-user" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                                <!-- username -->
                                                <!-- <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username"> -->
                                            <!-- </div> -->
                                            
                                            <div class="col-sm-6">
                                                <!-- phonenumber -->
                                                <input type="text" class="form-control form-control-user" name="phonenumber" id="phonenumber" placeholder="Phone number" value="<?php echo $phonenumber ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!-- email add -->
                                            <input type="email" class="form-control form-control-user" name="email_address" id="email_address" placeholder="Email Address" value="<?php echo $email_address ?>">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <!-- password -->
                                                <input type="password" class="form-control form-control-user" name="pass_word" id="pass_word" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- repeat password -->
                                                <input type="password" class="form-control form-control-user" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password">
                                            </div>                           
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <!-- gender -->
                                                <!-- <input type="text" class="form-control form-control-user" name="gender" id="gender" placeholder="Gender"> -->
                                                <select name="gender" id="gender" class="form-control form-control-user">
                                                    <option value="">Gender (Optional)</option>
                                                    <option <?php if($gender == "Male") echo "selected"; ?> value="Male">
                                                        Male</option>
                                                    <option <?php if($gender == "Female") echo "selected"; ?> value="Female">
                                                        Female</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <!-- birthday -->
                                                <input type="date" class="form-control form-control-user" name="birthday" 
                                                    id="birthday" placeholder="Birthday" value="<?php echo $birthday ?>">
                                            </div>                           
                                        </div>

                                        <div class="form-group">
                                            <!-- address -->
                                            <input type="text" class="form-control form-control-user" name="address" id="address" 
                                                placeholder="Address" value="<?php echo $address ?>">
                                        </div>

                                        <!-- create acc button -->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="createaccount" id="createaccount" 
                                            value="Create Account">
                                        
                                    </form>
                                    <!-- </form> -->

                                    <!-- <hr>

                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>

                                    <div class="text-center">
                                        <a class="small" href="createnewaccount.php">Create New Account</a>
                                    </div> -->

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>

                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <!-- --------------------------------------------- -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>