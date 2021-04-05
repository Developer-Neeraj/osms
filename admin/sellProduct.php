<?php 
    define('PAGE', 'Update Product');
    define('PAGE1', 'Assets');
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
        <h3 class="text-center">Customer Bill</h3>
        <?php
            if(isset($_REQUEST["issue"])) {
                $sql = "SELECT * FROM assets_tb WHERE prod_Id = {$_REQUEST["id"]}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            if(isset($_REQUEST["submit"])) {
                if(($_REQUEST["cname"] == "") || ($_REQUEST["cadd"] == "") || ($_REQUEST["pname"] == "") || ($_REQUEST["pquantity"] == "") || 
                ($_REQUEST["peach"] == "") || ($_REQUEST["ptotal"] == "") || ($_REQUEST["pdate"] == "")) {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-3">Fill All Field</div>';
                }
                else {
                    $cname = $_REQUEST["cname"];
                    $cadd = $_REQUEST["cadd"];
                    $pname = $_REQUEST["pname"];
                    $pquantity = $_REQUEST["pquantity"];
                    $peach = $_REQUEST["peach"];
                    $ptotal = $_REQUEST["ptotal"];
                    $pdate = $_REQUEST["pdate"];
                    $sql = "INSERT INTO customer_tb (cname, cadd, cpname, cpquantity, cpeach, cptotal, cpsdate) values('$cname', '$cadd', '$pname',
                    '$pquantity', '$peach', '$ptotal', '$pdate')";
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
                <label for="pid">Product Id</label>
                <input type="text" name="pid" id="pid" class="form-control" readonly value="<?php if(isset($row['prod_Id'])) echo $row['prod_Id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cname">Customer Name</label>
                <input type="text" name="cname" id="cname" class="form-control">
            </div>            <div class="form-group">
                <label for="cadd">Customer Address</label>
                <input type="text" name="cadd" id="cadd" class="form-control">
            </div>
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" name="pname" id="pname" class="form-control" readonly value="<?php if(isset($row['prod_name'])) echo $row['prod_name']; ?>">
            </div>
            <div class="form-group">
                <label for="pavail">Available</label>
                <input type="text" name="pavail" id="pavail" class="form-control" readonly value="<?php if(isset($row['prod_avail'])) echo $row['prod_avail']; ?>">
            </div>
            <div class="form-group">
                <label for="pquantity">Quantity</label>
                <input type="text" name="pquantity" id="ptotal" class="form-control">
            </div>
            <div class="form-group">
                <label for="peach">Price Each</label>
                <input type="text" name="peach" id="peach" class="form-control" readonly value="<?php if(isset($row['prod_price'])) echo $row['prod_price']; ?>">
            </div>
            <div class="form-group">
                <label for="ptotal">Total Price</label>
                <input type="text" name="ptotal" id="ptotal" class="form-control">
            </div>
            <div class="form-group">
                <label for="pdate">Date</label>
                <input type="date" name="pdate" id="pdate" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-sm btn-danger">Submit</button>
                <a href="asset.php" class="btn btn-secondary btn-sm">Close</a>
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