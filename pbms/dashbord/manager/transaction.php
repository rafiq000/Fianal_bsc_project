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
            $customer_id =  $_POST['customer_id'];
            $goods_name =  $_POST['goods_name'];
            $goods_price =  $_POST['goods_price'];
            $goods_quantity =  $_POST['goods_quantity'];
            $goods_amount = $goods_price * $goods_quantity;
            $buyOrSell = $_POST['select'];

            $sql = "INSERT INTO `transaction`(`customer_id`, `manager_id`, `goods_name`, `price`, `amount`, `goods_quantity`, `buyORsell`) VALUES ('$customer_id','$id','$goods_name','$goods_price','$goods_amount','$goods_quantity','$buyOrSell')";
            // mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
            if (mysqli_query($conn, $sql)) {
                $success_msg = "Transaction Successfull!";
                if ($buyOrSell == 'buy') {
                    header("location: pay.php?amount=" . $goods_amount . "&cust_id=" . $customer_id);
                } elseif ($buyOrSell == 'sell') {
                    header("location: take.php?amount=" . $goods_amount . "&cust_id=" . $customer_id);
                }
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
                    <h3 class=" text-center">A New Transaction</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Transaction Type</label>
                            <select class="form-select" aria-label="Default select example" name="select">
                                <option selected>Select Buy or Sell</option>
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Id</label>
                            <input type="text" class="form-control" name="customer_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods Name</label>
                            <input type="text" class="form-control" name="goods_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods Price</label>
                            <input type="text" class="form-control" name="goods_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods Quantity</label>
                            <input type="text" class="form-control" name="goods_quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Insert Data</button>
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