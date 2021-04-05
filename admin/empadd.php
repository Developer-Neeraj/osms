<?php 
    define('PAGE1', 'Technician');
    define('PAGE', 'technique');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
?>

<div class="col-sm-9 col-md-10">
    <div class="col-sm-6 jumbotron mt-5">
        <h3 class="text-center">Update Technician Details</h3>
        <?php
            if(isset($_REQUEST["edit"])) {
                $sql = "SELECT * FROM technician_tb WHERE empId = {$_REQUEST["id"]}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            if(isset($_REQUEST["editrequest"])) {
                if(($_REQUEST["emid"] == "") || ($_REQUEST["emName"] == "") || ($_REQUEST["emCity"] == "")
                || ($_REQUEST["emMobile"] == "") || ($_REQUEST["emEmail"] == "")) {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-3">Fill All Field</div>';
                }
                else {
                    $emid = $_REQUEST["emid"];
                    $emName = $_REQUEST["emName"];
                    $emCity = $_REQUEST["emCity"];
                    $emMobile = $_REQUEST["emMobile"];
                    $emEmail = $_REQUEST["emEmail"];
                    $sql = "UPDATE technician_tb SET empName = '$emName', empCity = '$emCity', empMobile = '$emMobile', empEmail = '$emEmail' WHERE empId = '$emid'";
                    if($conn->query($sql)){
                        $msg = '<div class="alert alert-danger col-sm-6 mt-3">Update Successful</div>';
                    } else {
                        $msg = '<div class="alert alert-danger col-sm-6 mt-3">Unable Update</div>';
                    }
                }
            }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="Rid">Request Id</label>
                <input type="text" name="emid" id="Rid" class="form-control" value="<?php if(isset($row['empId'])) echo $row['empId']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="emName">Name</label>
                <input type="text" name="emName" id="emName" class="form-control" value="<?php if(isset($row['empName'])) echo $row['empName']; ?>">
            </div>
            <div class="form-group">
                <label for="emCity">City</label>
                <input type="text" name="emCity" id="emCity" class="form-control" value="<?php if(isset($row['empCity'])) echo $row['empCity']; ?>">
            </div><div class="form-group">
                <label for="emMobile">Mobile</label>
                <input type="text" name="emMobile" id="emMobile" class="form-control" value="<?php if(isset($row['empMobile'])) echo $row['empMobile']; ?>">
            </div>
            <div class="form-group">
                <label for="emEmail">Email</label>
                <input type="email" name="emEmail" id="emEmail" class="form-control" value="<?php if(isset($row['empEmail'])) echo $row['empEmail']; ?>">
            </div>
            <div class="text-center">
                <button type="submit" name="editrequest" class="btn btn-sm btn-danger">Update</button>
                <a href="technique.php" class="btn btn-secondary btn-sm">Close</a>
            </div>
        </form>
        <?php 
            if(isset($msg)) {
                echo $msg;
            }
        ?>
    </div>
</div>

<?php 
    include "includes/footer.php";
?>