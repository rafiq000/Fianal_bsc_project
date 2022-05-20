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
<div>

</div>
<div class="container">
    <div class="row">
        <!-- <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">Admin: 2</p>
                    <p class="card-text">Manager: 5</p>
                    <p class="card-text">Customer: 10</p>
                </div>
            </div>
        </div> -->
        <br>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Amount Information</h5>
                    <p class="card-text">Total Transaction: 120000 tk</p>
                    <p class="card-text">Total Paid Amount: 20000 tk</p>
                    <p class="card-text">Total Take Amount: 100000 tk</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transaction Information</h5>
                    <p class="card-text">Total Transaction time: 12 time</p>
                    <p class="card-text">Total Paid time: 5 time</p>
                    <p class="card-text">Total Take time: 7 time</p>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Basic Statistic</h5>
                    <div class="container">
                        <!-- Trigger/Open The Modal -->
                        <div class=" text-center">
                            <button class=" btn btn-primary" id="myBtn">Last 30 day Transaction statistic</button>
                            <hr>
                            <button class=" btn btn-primary" id="myBtn">Last 12 Month Transaction statistic</button>
                            <hr>
                            <button class=" btn btn-primary" id="myBtn">All Transaction statistic</button>
                        </div>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div>
                                    <canvas id="myChart"></canvas>
                                    <script>
                                        const labels = [
                                            '01',
                                            '02',
                                            '03',
                                            '04',
                                            '05',
                                            '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
                                        ];

                                        const data = {
                                            labels: labels,
                                            datasets: [{
                                                label: 'The Daily Transaction',
                                                backgroundColor: 'rgb(255, 99, 132)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                data: [0, 10, 5, 2, 20, 30, 45],
                                            }]
                                        };

                                        const config = {
                                            type: 'line',
                                            data: data,
                                            options: {}
                                        };
                                        const myChart = new Chart(
                                            document.getElementById('myChart'),
                                            config
                                        )
                                    </script>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">All The Manager List</h5>
                    <a href="manager.php" class="btn btn-primary">Manager</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">All Customer List</h5>
                    <a href="customer.php" class="btn btn-primary">Customer</a>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!--Container Main end-->

</body>

</html>