<?php 
    define('TITLE', 'Service Status');
    define('PAGE', 'ServiceStatus');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['isLogin'])) {
        $rMail = $_SESSION['rEmail'];
    } else {
        echo "<script> location.href='RequesterLogin.php'; </script>";
    }
?>

<!-- start check service status -->

<div class="col-sm-6 mt-5 ml-5">
    <form action="" method="post" class="form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Request Id : &nbsp;&nbsp;</label>
            <input type="text" class="form-control" name="checkid" id="checkid" onKeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
    <?php 
        if(isset($_REQUEST['checkid'])) {
            if(($_REQUEST['checkid'] == "")) {
                $msg = "<div class='alert alert-info col-sm-6 mt-4'>Fill Your Request Id</div>";
            }
            else {
            $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row['request_id'] == $_REQUEST['checkid']) { ?>
        <h3 class="text-center mt-5">Assign Work Details</h3>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Request Id</td>
                    <td><?php if(isset($row['request_id'])) echo $row['request_id']; ?></td>
                </tr>
                <tr>
                    <td>Request Id</td>
                    <td><?php if(isset($row['request_info'])) echo $row['request_info']; ?></td>
                </tr>
                <tr>
                    <td>Request Description</td>
                    <td><?php if(isset($row['request_desc'])) echo $row['request_desc']; ?></td>
                </tr>
                <tr>
                    <td>Address 1</td>
                    <td><?php if(isset($row['request_add1'])) echo $row['request_add1']; ?></td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td><?php if(isset($row['request_add2'])) echo $row['request_add2']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php if(isset($row['request_city'])) echo $row['request_city']; ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php if(isset($row['request_state'])) echo $row['request_state']; ?></td>
                </tr>
                <tr>
                    <td>Zip</td>
                    <td><?php if(isset($row['request_zip'])) echo $row['request_zip']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php if(isset($row['request_email'])) echo $row['request_email']; ?></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><?php if(isset($row['request_mobile'])) echo $row['request_mobile']; ?></td>
                </tr>
                <tr>
                    <td>Technician Name</td>
                    <td><?php if(isset($row['request_assign'])) echo $row['request_assign']; ?></td>
                </tr>
                <tr>
                    <td>Assign Date</td>
                    <td><?php if(isset($row['request_date'])) echo $row['request_date']; ?></td>
                </tr>
                <tr>
                    <td>Customer Sign</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Technician Sign</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center mb-4 d-print-none"> 
            <form action="" method="post">
                <input type="submit" value="Print" class="btn btn-sm mr-2 btn-danger" onClick="window.print()">
                <input type="submit" value="close" class="btn btn-sm ml-2 btn-secondary">
            </form>
        </div>
        
        <?php 
            }
            else {
                echo "<div class='alert alert-info col-sm-6 mt-5'>Your Request is Still Panding</div>";
            }
        }
    }
        ?>
        
        <?php
            if(isset($msg)) {
                echo $msg;
            }
        ?>
</div>

<!-- =====Only number for input field -->

<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which)
        if(!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<!-- End check service status -->

<?php 
    include "includes/footer.php";
?>