<?php
// Include connection file
require_once "../inc/connect.php";

// Initialize the session
session_start();
$goods_name = '';
$max_price = 0;
$min_price = 0;
$m_id = $_SESSION["id"];
$id = $_SESSION["id"];
// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $q_sub =  $_POST['q_sub'];
            $query =  $_POST['query'];

            $sql = "INSERT INTO `query`(`customer_id`,`query_subject`, `query_text`, `manager_id`, `query_start_time`) VALUES ('$id','$q_sub','$query','$m_id',now())";
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
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class=" text-center">Query</h3>
                    <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); 
                                    ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="q_sub" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Query</label>
                            <textarea type="text" class="form-control" name="query" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Insert Data</button>
                        <span><?php
                                // if (!empty($success_msg)) {
                                //     echo '<div class="alert alert-success">' . $success_msg . '</div>';
                                // }
                                ?>
                        </span>
                    </form>
                </div> -->
        <div class="col">
            <h3 class=" text-center">Query List</h3>
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
                                <th scope="col">Customer</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Query</th>
                                <th scope="col">Replay</th>
                                <th scope="col">Query at</th>
                                <th scope="col">Replay at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `query` WHERE `customer_id` = '$id'";
                            $query = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($query)) {
                                echo "<tr>
                                        <td>" . $row["q_id"] . "</td>
                                        <td>" . $row["customer_id"] . "</td>
                                        <td>" . $row["query_subject"] . "</td>
                                        <td>" . $row["query_text"] . "</td>
                                        <td>" . $row["query_replay"] . "</td>
                                        <td>" . $row["query_start_time"] . "</td>
                                        <td>" . $row["query_replay_time"] . "</td>
                                        <td><a class='btn btn-primary' href='query_replay.php?id=" . $row["q_id"] . "' role='button'>Replay</a>" . "</td>
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