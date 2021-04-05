<?php 
    define('TITLE', 'Submit Request');
    define('PAGE', 'SUBMITrequest');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if($_SESSION['isLogin']) {
        $rMail = $_SESSION['rEmail'];
    }
    else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    if(isset($_REQUEST['submitrequest'])) {
        // checking for empty field
        if(($_REQUEST['requestInfo'] == "") || ($_REQUEST['requestDesc'] == "")
         || ($_REQUEST['requestName'] == "") || ($_REQUEST['requestAdd1'] == "") 
         || ($_REQUEST['requestAdd2'] == "") || ($_REQUEST['requestCity'] == "") 
         || ($_REQUEST['requestState'] == "") || ($_REQUEST['requestZip'] == "")
         || ($_REQUEST['requestEmail'] == "") || ($_REQUEST['requestMobile'] == "") 
         || ($_REQUEST['requestDate'] == "")) {
            $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-4'>Fill All Field</div>";
        }
        else {
            $rInfo = $_REQUEST['requestInfo'];
            $rDesc = $_REQUEST['requestDesc'];
            $rName = $_REQUEST['requestName'];
            $rAdd1 = $_REQUEST['requestAdd1'];
            $rAdd2 = $_REQUEST['requestAdd2'];
            $rCity = $_REQUEST['requestCity'];
            $rState = $_REQUEST['requestState'];
            $rZip = $_REQUEST['requestZip'];
            $rEmail = $_REQUEST['requestEmail'];
            $rMobile = $_REQUEST['requestMobile'];
            $rDate = $_REQUEST['requestDate'];
            $sql = "INSERT INTO submitrequest_tb(requester_info, requester_desc, requester_name, requester_add1,
             requester_add2, requester_city,requester_state,requester_zip, requester_email, requester_mobile, requester_date) VALUES
             ('$rInfo', '$rDesc', '$rName', '$rAdd1', '$rAdd2', '$rCity', '$rState', '$rZip', '$rEmail', '$rMobile', '$rDate')";
            // $result = $conn->query($sql);
            if($conn->query($sql) == TRUE) {
                $genid = mysqli_insert_id($conn);
                $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-4'>Request Submit Successful</div>";
                $_SESSION['id'] = $genid;
                echo "<script>location.href='submitRequestSuccess.php'</script>";
            }else {
                $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-4'>Request Submit Unsuccessful</div>";
            }
        }
    }
?>
<!-- =====service Request form 2nd column-->
<div class="col-sm-9 col-md-10 mt-5">
    <form class="mx-5" action="" method="POST">
        <div class="form-group submitRequest">
            <label for="inputAddress">Request info</label>
            <input type="text" name="requestInfo" class="form-control" id="inputAddress" placeholder="Request info">
        </div>
        <div class="form-group submitRequest">
            <label for="inputAddress">Description</label>
            <input type="text" name="requestDesc" class="form-control" id="inputAddress" placeholder="Write Description">
        </div>
        <div class="form-group submitRequest">
            <label for="inputAddress">Name</label>
            <input type="text" name="requestName" class="form-control" id="inputAddress" placeholder="Neeraj">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 submitRequest">
                <label for="inputEmail4">Address Line 1</label>
                <input type="text" name="requestAdd1" class="form-control" id="inputEmail4" placeholder="House no.">
            </div>
            <div class="form-group col-md-6 submitRequest">
                <label for="inputPassword4">Address Line 2</label>
                <input type="text" name="requestAdd2" class="form-control" id="inputPassword4" placeholder="Railway line">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 submitRequest">
                <label for="inputCity">City</label>
                <input type="text" name="requestCity" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4 submitRequest">
                <label for="inputState">State</label>
                <input id="inputState" name="requestState" class="form-control">
            </div>
            <div class="form-group col-md-2 submitRequest">
                <label for="inputZip">Zip</label>
                <input type="text" name="requestZip" class="form-control" id="inputZip" onKeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 submitRequest">
                <label for="inputCity">Email</label>
                <input type="email" name="requestEmail" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3 submitRequest">
                <label for="inputState">Mobile</label>
                <input type="text" name="requestMobile" class="form-control" id="inputCity" onKeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-3 submitRequest">
                <label for="inputZip">Date</label>
                <input type="date" name="requestDate" class="form-control" id="inputZip">
            </div>
        </div>
        <button name="submitrequest" type="submit" class="btn btn-sm btn-danger">Submit</button>
        <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
    </form>
    <?php
        if(isset($msg)) {
            echo $msg;
        }
    ?>

</div>
<!-- =====End service Request form 2nd column -->
<!-- =====Only number for input field -->

<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which)
        if(!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php 
    include "includes/footer.php";
?>