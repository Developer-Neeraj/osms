<?php 
    if(session_id() == "") {
        session_start();
    }
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
    if(isset($_REQUEST['id'])) {
        $sql = "SELECT * FROM submitrequest_tb WHERE requester_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_REQUEST['close'])) {
        $sql = "DELETE FROM submitrequest_tb WHERE requester_id = {$_REQUEST['id']}";
        if($conn->query($sql)) {
            echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
        }
        else {
            echo "Unable To Delete";
        }
    }
    if(isset($_REQUEST['assign'])) {
        if(($_REQUEST['requestId'] == "") || ($_REQUEST['requestInfo'] == "") || ($_REQUEST['requestDesc'] == "") 
        || ($_REQUEST['requestName'] == "") || ($_REQUEST['requestAdd1'] == "") || ($_REQUEST['requestAdd2'] == "")
        || ($_REQUEST['requestCity'] == "") || ($_REQUEST['requestState'] == "") || ($_REQUEST['requestZip'] == "")
        || ($_REQUEST['requestEmail'] == "") || ($_REQUEST['requestMobile'] == "") || ($_REQUEST['requestAssign'] == "")
        || ($_REQUEST['requestDate'] == "")) { 
            $msg = "<div class='alert alert-warning col-sm-8 mt-5 ml-3'>Fill All Field</div>";
        }
        else {
            $req_id = $_REQUEST['requestId'];
            $req_info = $_REQUEST['requestInfo'];
            $req_desc = $_REQUEST['requestDesc'];
            $req_name = $_REQUEST['requestName'];
            $req_add1 = $_REQUEST['requestAdd1'];
            $req_add2 = $_REQUEST['requestAdd2'];
            $req_city = $_REQUEST['requestCity'];
            $req_state = $_REQUEST['requestState'];
            $req_zip = $_REQUEST['requestZip'];
            $req_email = $_REQUEST['requestEmail'];
            $req_mobile = $_REQUEST['requestMobile'];
            $req_assign = $_REQUEST['requestAssign'];
            $req_date = $_REQUEST['requestDate'];            
            $sql = "INSERT INTO `assignwork_tb` (`request_id`, `request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `request_assign`, `request_date`) VALUES
            ('$req_id', '$req_info', '$req_desc', '$req_name', '$req_add1', '$req_add2', '$req_city', '$req_state',
             '$req_zip', '$req_email', '$req_mobile', '$req_assign', '$req_date')";
            if($conn->query($sql) == TRUE) {
                $msg = "<div class='alert alert-danger col-sm-6 ml-2 mt-5'>Request Assign Successful</div>";
            } else {
                $msg = "<div class='alert alert-danger col-sm-6 ml-2 mt-5'>Request Assign Successful</div>";
            }
    
        }
    }
?>

<div class="col-sm-5 mt-5 jumbotron">
    <form action="" method="POST">
        <h5 class="text-center">Assign Work Order Request</h5>
        <div class="form-group submitRequest">
            <label for="inputAddress">Request Id</label>
            <input type="text" name="requestId" readonly class="form-control" id="inputAddress"
                value="<?php if(isset($row['requester_id'])) { echo $row['requester_id']; } ?>">
        </div>
        <div class="form-group submitRequest">
            <label for="inputAddress">Request info</label>
            <input type="text" name="requestInfo" class="form-control" id="inputAddress"
                value="<?php if(isset($row['requester_info'])) { echo $row['requester_info']; } ?>">
        </div>
        <div class="form-group submitRequest">
            <label for="inputAddress">Description</label>
            <input type="text" name="requestDesc" class="form-control" id="inputAddress"
                value="<?php if(isset($row['requester_desc'])) { echo $row['requester_desc']; } ?>">
        </div>
        <div class="form-group submitRequest">
            <label for="inputAddress">Name</label>
            <input type="text" name="requestName" class="form-control" id="inputAddress"
                value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 submitRequest">
                <label for="inputEmail4">Address Line 1</label>
                <input type="text" name="requestAdd1" class="form-control" id="inputEmail4"
                    value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
            </div>
            <div class="form-group col-md-6 submitRequest">
                <label for="inputPassword4">Address Line 2</label>
                <input type="text" name="requestAdd2" class="form-control" id="inputPassword4"
                    value="<?php if(isset($row['requester_add2'])) { echo $row['requester_add2']; } ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4 submitRequest">
                <label for="inputCity">City</label>
                <input type="text" name="requestCity" class="form-control" id="inputCity"
                    value="<?php if(isset($row['requester_city'])) { echo $row['requester_city']; } ?>">
            </div>
            <div class="form-group col-md-4 submitRequest">
                <label for="inputState">State</label>
                <input id="inputState" name="requestState" class="form-control"
                    value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>">
            </div>
            <div class="form-group col-md-4 submitRequest">
                <label for="inputZip">Zip</label>
                <input type="text" name="requestZip" class="form-control" id="inputZip"
                    onKeypress="isInputNumber(event)"
                    value="<?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8 submitRequest">
                <label for="inputCity">Email</label>
                <input type="email" name="requestEmail" class="form-control" id="inputCity"
                    value="<?php if(isset($row['requester_email'])) { echo $row['requester_email']; } ?>">
            </div>
            <div class="form-group col-md-4 submitRequest">
                <label for="inputState">Mobile</label>
                <input type="text" name="requestMobile" class="form-control" id="inputCity"
                    onKeypress="isInputNumber(event)"
                    value="<?php if(isset($row['requester_mobile'])) { echo $row['requester_mobile']; } ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7 submitRequest">
                <label for="inputCity">Assign To Technician</label>
                <input type="text" name="requestAssign" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-5 submitRequest">
                <label for="inputZip">Date</label>
                <input type="date" name="requestDate" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="float-right">
            <button name="assign" type="submit" class="btn btn-sm btn-success">Assign</button>
            <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
        </div>
    </form>
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
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>