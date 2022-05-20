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
                        <th scope="col">User Name</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Registration Time</th>
                        <th scope="col">Manager ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `customer`";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["user_name"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["mobaile"] . "</td>
                                        <td>" . $row["registration_time"] . "</td>
                                        <td>" . $row["manager_id"] . "</td>
                                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </table>
    </div>
</div>