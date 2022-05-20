<?php
// Include connection file
require_once "../inc/connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// Initialize the session
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if ($_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $q_replay =  $_POST['replay'];
            $id = $_POST['id'];

            $sql = "UPDATE `query` SET `query_replay`='$q_replay',`query_replay_time`= now() WHERE `q_id`= '$id';";
            // mysqli_query($conn, $sql) or die("Database Connection failed: " . mysqli_connect_error());
            if (mysqli_query($conn, $sql)) {
                $success_msg = "Replay Successfull!";
                header('location: query.php');
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
        <?php
        $sql = "SELECT * FROM `query` WHERE `q_id` = '$id'";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
            $q_id =  $row["q_id"];
            $customer_id =  $row["customer_id"];
            $query_subject = $row["query_subject"];
            $query_text = $row["query_text"];
            $query_replay = $row["query_replay"];
            $query_start_time = $row["query_start_time"];
        }
        ?>
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Query ID</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $q_id ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Query Subject</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $query_subject ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Query</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $query_text ?> </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Query Started At</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $query_start_time  ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class=" text-center text-danger">Replay</h3>
        <span><?php
                if (!empty($success_msg)) {
                    echo '<div class="alert alert-success">' . $success_msg . '</div>';
                }
                ?>
        </span>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Replay</label>
                <textarea type="text" class="form-control" name="replay" rows="5">
                <?php if (isset($query_replay)) {
                    echo $query_replay;
                }; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary me-md-2 btn-lg" name="submit">Replay</button>
            </div>

        </form>
    </div>
</div>
</section>
</div>