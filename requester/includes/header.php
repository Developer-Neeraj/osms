<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-danger fixed-top flex-md-nowrap p-0 shadow d-print-none">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">N.V</a>
    </nav>

    <!-- side navbar -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <!-- =====start side bar 1st column-->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'RequesterProfile') { echo 'active'; }; ?>" href="RequesterProfile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'SUBMITrequest') { echo 'active'; }; ?>" href="submitRequest.php"><i class="fab fa-accessible-icon"></i> Submit Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ServiceStatus') { echo 'active'; }; ?>" href="checkStatus.php"><i class="fa fa-question-circle-o"></i> Service Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ChangePassword') { echo 'active'; }; ?>" href="RequesterChangePass.php"><i class="fas fa-key"></i> Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- =====End side bar 1st column-->
            