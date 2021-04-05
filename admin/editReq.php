<?php 
    define('PAGE1', 'Requester');
    define('PAGE', 'Requester');
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
        <h3 class="text-center">Update Request Details</h3>
        <?php
            if(isset($_REQUEST["edit"])) {
                $sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST["id"]}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            if(isset($_REQUEST["editrequest"])) {
                if(($_REQUEST["Rid"] == "") || ($_REQUEST["Rname"] == "") || ($_REQUEST["Remail"] == "")) {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-3">Fill All Field</div>';
                }
                else {
                    $rid = $_REQUEST["Rid"];
                    $rname = $_REQUEST["Rname"];
                    $remail = $_REQUEST["Remail"];
                    $sql = "UPDATE requesterlogin_tb SET r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
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
                <input type="text" name="Rid" id="Rid" class="form-control" value="<?php if(isset($row['r_login_id'])) echo $row['r_login_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Rname">Name</label>
                <input type="text" name="Rname" id="Rname" class="form-control" value="<?php if(isset($row['r_name'])) echo $row['r_name']; ?>">
            </div>
            <div class="form-group">
                <label for="Remail">Email</label>
                <input type="email" name="Remail" id="Remail" class="form-control" value="<?php if(isset($row['r_email'])) echo $row['r_email']; ?>">
            </div>
            <div class="text-center">
                <button type="submit" name="editrequest" class="btn btn-sm btn-danger">Update</button>
                <a href="requester.php" class="btn btn-secondary btn-sm">Close</a>
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