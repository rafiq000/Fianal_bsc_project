<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include 'sidebar.php';
?>
<!--Container Main start-->
<div class="">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <table class="table table-hover">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary">search</button>
                </div>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Manager ID</th>
                        <th scope="col">Goods Name</th>
                        <th scope="col">Goods Price(Per Kg)</th>
                        <th scope="col">Goods Total Amount</th>
                        <th scope="col">Goods Total Quantity</th>
                        <th scope="col">Transaction Time</th>
                        <th scope="col">Transaction Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `transaction`";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>
                                        <td>" . $row["trans_id"] . "</td>
                                        <td>" . $row["customer_id"] . "</td>
                                        <td>" . $row["manager_id"] . "</td>
                                        <td>" . $row["goods_name"] . "</td>
                                        <td>" . $row["price"] . "</td>
                                        <td>" . $row["amount"] . "</td>
                                        <td>" . $row["goods_quantity"] . "</td>
                                        <td>" . $row["trans_time"] . "</td>
                                        <td>" . $row["buyORsell"] . "</td>
                                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </table>
    </div>
</div>