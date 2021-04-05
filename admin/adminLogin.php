<?php 
    include "../dbconnection.php";
    session_start();
    if(!isset($_SESSION['aLogin'])) {
        if(isset($_REQUEST["aemail"])) {
            $aMail = mysqli_real_escape_string($conn, trim($_REQUEST['aemail']));
            $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['apass']));
            $sql = "SELECT a_email, a_pass FROM adminLogin_tb WHERE a_email = '".$aMail."' 
            AND a_pass = '".$aPassword."' LIMIT 1";
            $result = $conn->query($sql);
            if($result->num_rows == 1) {
                $_SESSION['aLogin'] = true;
                $_SESSION['aEmail'] = $aMail;
                echo "<script> location.href='dashboard.php'; </script>";
                exit;
            }
            else {
                $msg = "<div class='alert alert-warning mt-2'>Enter a valid Email or Password</div>";
            }
        } 
    }
    else {
        echo "<script> location.href='dashboard.php'; </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/custom.css">
    <title>Login</title>
</head>

<body>
    <div class="text-center mt-5">
        <i class="fas fa-stethoscope"></i>
        <span style="font-size: 30px">Online Service Management System</span>
        <p class="text-center" style="font-size: 20px"><i class="fas fa-user-secret text-danger"></i> Admin Area
            (Demo)</p>
    </div>
    <div class="container-fluid" style="margin-top: 8vh">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="post">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" name="aemail" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
                        <input type="password" name="apass" id="pass" class="form-control" placeholder="Password">
                    </div>
                    <button name="submit" type="submit"
                        class="btn btn-outline-danger btn-block font-weight-bold shadow-sm mt-3">Login</button>
                    <?php 
                        if(isset($msg)) {
                            echo $msg;
                        };
                    ?>
                </form>
                <a class="btn btn-sm btn-primary mt-4" href="../index.php" style="position: relative; left: 50%; transform: translateX(-50%);">Back To Home</a>
            </div>
        </div>
    </div>

    <!-- Javascript Files -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>