<?php
$pg = basename(substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '.'))); // get file name from url and strip extension
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
    <script src="../../js/toggle.js"></script>
</head>

<body id="body-pd" style="background-color: #eee;">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class=" text-center text-uppercase">
            <h2><?php echo $pg ?></h2>
        </div>
        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuOffset">
                <?php echo $_SESSION["username"] ?>
            </button>
            <ul class="dropdown-menu " aria-labelledby="dropdownMenu2">
                <li><a class="dropdown-item text-end" href="profile.php">
                        <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item text-end" href="logout.php">
                        <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="../../" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>PBMS</b>"></i> <span class="nav_logo-name">PBMS</span>
                </a>
                <div class="nav_list">
                    <a href="dashbord.php" class="nav_link <?php if ($pg == 'dashbord') { ?>active<?php } ?>">
                        <i class='bx bx-grid-alt nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Dashboard</b>"></i> <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="profile.php" class="nav_link <?php if ($pg == 'profile') { ?>active<?php } ?>">
                        <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Profile</b>"></i> <span class="nav_name">Profile</span>
                    </a>
                    <a href="query.php" class="nav_link <?php if ($pg == 'query') { ?>active<?php } ?>">
                        <i class='bx bx-bookmark nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Query</b>"></i> <span class="nav_name">Query</span>
                    </a>
                    <a href="transaction.php" class="nav_link <?php if ($pg == 'transaction') { ?>active<?php } ?>">
                        <i class='bx bx-bar-chart-alt-2 nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Transaction</b>"></i> <span class="nav_name">Transaction</span>
                    </a>
                    <a href="take.php" class="nav_link <?php if ($pg == 'take') { ?>active<?php } ?>">
                        <i class='bx bx-bar-chart-alt-2 nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Take</b>"></i> <span class="nav_name">Take</span>
                    </a>
                    <a href="pay.php" class="nav_link <?php if ($pg == 'pay') { ?>active<?php } ?>">
                        <i class='bx bx-bar-chart-alt-2 nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Pay</b>"></i> <span class="nav_name">Pay</span>
                    </a>

                </div>
            </div>
            <!-- <a href="logout.php" class="nav_link">
                <i class='bx bx-log-out nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title=" <b>Log Out!</b>"></i> <span class="nav_name">Log Out!</span>
            </a> -->
        </nav>
    </div>