<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();
$goods_name = '';
$max_price = 0;
$min_price = 0;
// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $goods_name =  $_POST['goods_name'];
            $max_price =  $_POST['max_price'];
            $min_price =  $_POST['min_price'];

            $sql = "CALL goods_insert('$goods_name','$max_price','$min_price')";
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
<div>
    <section>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class=" text-center">Insert Goods Information</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods name</label>
                            <input type="text" class="form-control" name="goods_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods Maximum Price</label>
                            <input type="text" class="form-control" name="max_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Goods Minimum Price</label>
                            <input type="text" class="form-control" name="min_price" required>
                        </div>
                        <button type="submit" class="btn btn-info" name="submit">Update</button>
                        <span><?php
                                if (!empty($success_msg)) {
                                    echo '<div class="alert alert-success">' . $success_msg . '</div>';
                                }
                                ?>
                        </span>
                    </form>
                </div>
                <div class="col-lg-8">
                    <h3 class=" text-center">Goods List</h3>
                    <div class="table-responsive" style="max-height: 20rem;">
                        <table class="table table-striped table-hover">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Maximum Price</th>
                                        <th scope="col">Minimum Price</th>
                                        <th scope="col">Registration Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `goods` ORDER BY `goods_id` DESC";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo "<tr>
                                        <td>" . $row["goods_id"] . "</td>
                                        <td>" . $row["goods_name"] . "</td>
                                        <td>" . $row["goods_max_price"] . "</td>
                                        <td>" . $row["goods_min_price"] . "</td>
                                        <td>" . $row["reg_time"] . "</td>
                                        <td><a class='btn btn-primary' href='query_replay.php?id=" . $row["goods_id"] . "' role='button'>Update</a>" . "</td>
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