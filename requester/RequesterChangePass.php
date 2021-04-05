<?php 
    define('TITLE', 'Change Password');
    define('PAGE', 'ChangePassword');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if($_SESSION['isLogin']) {
        $rMail = $_SESSION['rEmail'];
    }
    else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    if(isset($_REQUEST['passUpdate'])) {
        if($_REQUEST['RequestPassword'] == "") {
            $PASSmsg = '<div class="alert alert-warning col-sm-6 ml-2 mt-2">Fill All Field</div>'; 
        }
        $rPASS = $_REQUEST['RequestPassword'];
        $sql = "UPDATE requesterlogin_tb SET r_password = '$rPASS' WHERE r_email = '$rMail'";
        // $result = $conn->query($sql)
        if($conn->query($sql) == TRUE) {
            $PASSmsg = '<div class="alert alert-warning col-sm-6 ml-2 mt-2">Update Successful</div>';
        } else {
            $PASSmsg = '<div class="alert alert-warning col-sm-6 ml-2 mt-2">Update Failed</div>';
        }
    }
?>
<div class="col-sm-6 mt-5 ml-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" readonly class="form-control" id="exampleInputEmail1" value="<?php echo $rMail; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input type="text" class="form-control" name="RequestPassword" id="exampleInputPassword1"
                placeholder="Password">
        </div>
        <button type="submit" name="passUpdate" class="btn btn-danger">Update</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    <?php 
        if(isset($PASSmsg)) {
            echo $PASSmsg;
        }
    ?>
</div>

<?php 
    include "includes/footer.php";
?>