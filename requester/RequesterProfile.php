<?php
    define('TITLE', 'Requester Profile'); 
    define('PAGE', 'RequesterProfile');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if($_SESSION['isLogin']) {
        $rMail = $_SESSION['rEmail'];
    }
    else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    $sql = "SELECT r_name FROM requesterLogin_tb WHERE r_email = '$rMail'";
    $result = $conn->query($sql);
    if($result->num_rows==1) {
        $row = $result->fetch_assoc();
        $name = $row['r_name'];
    }
    if(isset($_REQUEST["nameUpdate"])) {
        if($_REQUEST["User"] == "") {
            $namemsg = "<div class='alert alert-warning col-sm-6 ml-3 mt-3'>Fill all input filled</div>";
        }
        else {
            $Rname = $_REQUEST["User"];
            $sq = "UPDATE requesterLogin_tb SET r_name = '$Rname' WHERE r_email = '$rMail'";
            if($conn->query($sq) == TRUE) {
                $passmess = "<div class='alert alert-success col-sm-6 mt-3 ml-3'>Update Successful</div>";
            }
            else {
                $passmess = "<div class='alert alert-danger col-sm-6 mt-3 ml-3'>Unable to Update</div>";
            }
        }
    }

?>
<!-- =====start side bar 2nd column-->
<div class="col-sm-6 mt-5 ml-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="Email" class="form-control" id="exampleInputEmail1" readonly
                value="<?php echo $rMail; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="User" class="form-control" id="exampleInputPassword1" value="<?php echo $name; ?>">
        </div>
        <button type="submit" class="btn btn-danger" name="nameUpdate">Update</button>
        <?php 
            if(isset($namemsg)) {
                echo $namemsg;
            } else {
                if(isset($passmess)) {
                    echo $passmess;
                }
            }
        ?>
    </form>
</div>
<!-- =====End side bar 2nd column-->
<?php 
    include "includes/footer.php";
?>