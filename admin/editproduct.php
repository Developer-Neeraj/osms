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
        <h3 class="text-center">Update Product Details</h3>
        <?php
            if(isset($_REQUEST["edit"])) {
                $sql = "SELECT * FROM assets_tb WHERE prod_Id = {$_REQUEST["id"]}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            if(isset($_REQUEST["editrequest"])) {
                if(($_REQUEST["pid"] == "") || ($_REQUEST["pname"] == "") || ($_REQUEST["pdate"] == "") || ($_REQUEST["pavail"] == "") || 
                ($_REQUEST["ptotal"] == "") || ($_REQUEST["pcost"] == "") || ($_REQUEST["psell"] == "")) {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-3">Fill All Field</div>';
                }
                else {
                    $pid = $_REQUEST["pid"];
                    $pname = $_REQUEST["pname"];
                    $pdate = $_REQUEST["pdate"];
                    $pavail = $_REQUEST["pavail"];
                    $ptotal = $_REQUEST["ptotal"];
                    $pcost = $_REQUEST["pcost"];
                    $psell = $_REQUEST["psell"];
                    $sql = "UPDATE assets_tb SET prod_name = '$pname', prod_dop = '$pdate', 
                    prod_avail = '$pavail', prod_total = '$ptotal', prod_cost = '$pcost', prod_price = '$psell' WHERE prod_Id = '$pid'";
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
                <input type="text" name="pid" id="pid" class="form-control" value="<?php if(isset($row['prod_Id'])) echo $row['prod_Id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" name="pname" id="pname" class="form-control" value="<?php if(isset($row['prod_name'])) echo $row['prod_name']; ?>">
            </div>
            <div class="form-group">
                <label for="pdate">Date Of Purchase</label>
                <input type="date" name="pdate" id="pdate" class="form-control" value="<?php if(isset($row['prod_dop'])) echo $row['prod_dop']; ?>">
            </div>
            <div class="form-group">
                <label for="pavail">Available</label>
                <input type="text" name="pavail" id="pavail" class="form-control" value="<?php if(isset($row['prod_avail'])) echo $row['prod_avail']; ?>">
            </div>
            <div class="form-group">
                <label for="ptotal">Total</label>
                <input type="text" name="ptotal" id="ptotal" class="form-control" value="<?php if(isset($row['prod_total'])) echo $row['prod_total']; ?>">
            </div>
            <div class="form-group">
                <label for="pcost">Original Cost Each</label>
                <input type="text" name="pcost" id="pcost" class="form-control" value="<?php if(isset($row['prod_cost'])) echo $row['prod_cost']; ?>">
            </div>
            <div class="form-group">
                <label for="psell">Sell Price Each</label>
                <input type="text" name="psell" id="psell" class="form-control" value="<?php if(isset($row['prod_price'])) echo $row['prod_price']; ?>">
            </div>
            <div class="text-center">
                <button type="submit" name="editrequest" class="btn btn-sm btn-danger">Update</button>
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