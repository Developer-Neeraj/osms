<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE1; ?></title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-danger fixed-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">N.V</a>
    </nav>
    <!-- side navbar -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <!-- =====start side bar 1st column-->
            <nav class="col-sm-2 bg-light sidebar py-5">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'dashboard') { echo 'active'; }; ?>"
                                href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'work') { echo 'active'; }; ?>" href="work.php"><i
                                    class="fab fa-accessible-icon"></i> Work Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'request') { echo 'active'; }; ?>" href="request.php"><i
                                    class="fas fa-align-center"></i> Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'asset') { echo 'active'; }; ?>" href="asset.php"><i
                                    class="fas fa-database"></i> Assets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'technique') { echo 'active'; }; ?>"
                                href="technique.php"><i class="fas fa-headset"></i> Technician</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Requester') { echo 'active'; }; ?>"
                                href="requester.php"><i class="fas fa-users"></i> Requester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'sellReport') { echo 'active'; }; ?>"
                                href="sellReport.php"><i class="fas fa-table"></i> Sell Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'workReport') { echo 'active'; }; ?>"
                                href="workReport.php"><i class="fas fa-table"></i> Work Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ChangePass') { echo 'active'; }; ?>"
                                href="ChangePass.php"><i class="fas fa-key"></i> Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- =====End side bar 1st column-->