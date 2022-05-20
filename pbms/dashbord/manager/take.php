<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();
$id = $_SESSION["id"];
if (isset($_GET['amount'])) {
    $amount_get = $_GET['amount'];
}
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
}
// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $customer_id =  $_POST['customer_id'];
            $goods_amount =  $_POST['amount'];


            $sql = "INSERT INTO `cash_in`(`customer_id`, `manager_id`, `amount`) VALUES ('$customer_id','$id',' $goods_amount')";
            // mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
            if (mysqli_query($conn, $sql)) {
                $success_msg = "Paid Successfull!";
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
                <div class="col">
                    <h3 class=" text-center">Take Money From The Customer</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Id</label>
                            <input type="text" class="form-control" name="customer_id" value="
                            <?php if (isset($cust_id)) {
                                echo $cust_id;
                            }; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Amount(TK)</label>
                            <input type="text" class="form-control" name="amount" value="<?php if (isset($amount_get)) {
                                                                                                echo $amount_get;
                                                                                            }; ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary col-3" name="submit">Take Money</button>
                        <span><?php
                                if (!empty($success_msg)) {
                                    echo '<div class="alert alert-success">' . $success_msg . '</div>';
                                }
                                ?>
                        </span>
                    </form>
                </div>




            </div>
        </div>
    </section>
</div>