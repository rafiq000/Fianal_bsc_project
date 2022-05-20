<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();
$id = $_SESSION["id"];
// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $customer_name =  $_POST['customer_name'];
            $customer_user_name =  $_POST['customer_user_name'];
            $password =  $_POST['password'];
            $customer_mobile_no =  $_POST['customer_mobile_no'];
            $customer_address =  $_POST['customer_address'];

            $sql = "INSERT INTO `customer`(`user_name`, `name`, `mobaile`, `passward`, `address`, `manager_id`) VALUES ('$customer_name','$customer_user_name','$customer_mobile_no','$password','$customer_address','$id')";
            // mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
            if (mysqli_query($conn, $sql)) {
                $success_msg = "Inserted Successfully";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
            }
        }
    }
}
include 'sidebar.php';
?>
<!--Container Main start-->
<div class=" container">
    <section>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class=" text-center">Add A New Customer</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer name</label>
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer User Name</label>
                            <input type="text" class="form-control" name="customer_user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="Password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Mobile Number</label>
                            <input type="text" class="form-control" name="customer_mobile_no" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Address</label>
                            <input type="text" class="form-control" name="customer_address" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Add Customer Data</button>
                        <span><?php
                                if (!empty($success_msg)) {
                                    echo '<div class="alert alert-success">' . $success_msg . '</div>';
                                }
                                ?>
                        </span>
                    </form>
                </div>
                <div class="col-lg-8">
                    <h3 class=" text-center">Ccustomer List</h3>
                    <div class="table-responsive" style="max-height: 32rem;">
                        <table class="table table-striped table-hover">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Registration Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `customer` WHERE `manager_id` = $id";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["user_name"] . "</td>
                                        <td>" . $row["registration_time"] . "</td>
                                        <td><a class='btn btn-primary' href='customer_info.php?id=" . $row["id"] . "' role='button'>Detail</a></td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </section>
</div>