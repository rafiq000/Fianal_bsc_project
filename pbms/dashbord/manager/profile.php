<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    $se_username = $_SESSION["username"];
    $sql = "SELECT * FROM `manager` WHERE `user_name` = '$se_username'";

    $stmt = mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
    //$rows = mysqli_num_rows($result);
    $result = mysqli_fetch_array($stmt);
    // if ($rows == 1) {
    //     //Store data in session variables
    $_SESSION["id"] = $id = $result["id"];
    $username = $result["user_name"];
    $mobile = $result["mobaile"];
    $name = $result["name"];
    $address = $result["address"];
    $registration_time = $result["registration_time"];
    // } else {
    //     // Username doesn't exist, display a generic error message
    //     $login_err = "Invalid username or password.";
    //     header("location: login.php");
    // }
}
include 'sidebar.php';
?>
<!--Container Main start-->
<br><br>
<div>
    <h4><?php  ?></h4>
    <section>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../../img/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $username; ?> </h5>
                        <p class="text-muted mb-1">Manager</p>
                        <p class="text-muted mb-4">Some PBMS</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-outline-danger ms-1">Change Passwoard</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $name ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php  ?>example@example.com</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">(+880) <?php echo $mobile ?> </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Registration time</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $registration_time  ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $address ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Total Transaction Amount</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">100000 tk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>