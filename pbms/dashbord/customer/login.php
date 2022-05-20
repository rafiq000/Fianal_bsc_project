<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: dashbord.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT * FROM `customer` WHERE `user_name` = '$username' AND `passward` = '$password'";

        $query = mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
        $rows = mysqli_num_rows($query);
        //$result = mysqli_fetch_array($query);

        if ($rows == 1) {
            // Password is correct, so start a new session
            $result = mysqli_fetch_array($query);
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id = $result["id"];
            $_SESSION["username"] = $username;

            // Redirect user to welcome page
            header("location: dashbord.php");
        } else {
            // Username doesn't exist, display a generic error message
            $login_err = "Invalid username or password.";
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paddy Bussiness Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <h1 class=" text-center">Customer</h1>
        <div class="header_img"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="../../" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>PBMS</b>"></i>
                    <span class=" nav_logo-name">PBMS</span>
                </a>
                <div class="nav_list">
                    <a href="../admin/login.php" class="nav_link ">
                        <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Admin</b>"></i> <span class="nav_name">Admin</span>
                    </a>
                    <a href="../manager/login.php " class="nav_link ">
                        <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Manager</b>"></i> <span class="nav_name">Manager</span>
                    </a>
                    <a href="" class="nav_link active">
                        <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Customer</b>"></i> <span class="nav_name">Customer</span>
                    </a>

                </div>
            </div>
            <!-- <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
            </a> -->
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">

        <div class="wrapper">
            <h2 class=" text-center">Login</h2>
            <p class=" text-center text-danger">Please fill in your credentials to login.</p>

            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <!-- login form start -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">User Name</label>
                    <input type="text" class="form-control  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> " name="username" id="inputEmail4" alue="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password" id="inputPassword4">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>

                <div class="col-12 d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg" value="Login">Log in</button>
                </div>
            </form>
            <!-- login end -->
        </div>
    </div>
    <!--Container Main end-->
    <script src="../../js/toggle.js"></script>
</body>

</html>