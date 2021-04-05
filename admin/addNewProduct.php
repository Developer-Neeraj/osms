<?php 
    define('PAGE', 'Add New Product');
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

<?php 
    if(isset($_REQUEST['addNew'])) {
        if(($_REQUEST['pname'] == "") || ($_REQUEST['pdate'] == "") || ($_REQUEST['avail'] == "")
        || ($_REQUEST['total'] == "") || ($_REQUEST['cost'] == "") || ($_REQUEST['price'] == "")) {
            $msg = "<div class='alert alert-danger col-sm-6 mt-4'>Fill All Filled</div>";
        } else {
            $pname = $_REQUEST['pname'];
            $pdate = $_REQUEST['pdate'];
            $avail = $_REQUEST['avail'];
            $total = $_REQUEST['total'];
            $cost = $_REQUEST['cost'];
            $price = $_REQUEST['price'];
            $sql = "INSERT INTO assets_tb (prod_name, prod_dop, prod_avail, prod_total, prod_cost, prod_price) 
            VALUES ('$pname', '$pdate', '$avail', '$total', '$cost', '$price')";
            if($conn->query($sql)) {
                $msg = "<div class='alert alert-danger col-sm-6 mt-4'>Success</div>";
            }
            else {
                $msg = "<div class='alert alert-danger col-sm-6 mt-4'>Unable to Insert</div>";
            }
        }
    }
?>

<div class="col-md-10 col-sm-9">
    <div class="col-sm-6 jumbotron mt-5 ml-5">
        <h3 class="text-center">Add New Product</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" name="pname" id="pname" class="form-control">
            </div>
            <div class="form-group">
                <label for="pdate">Date Of Purchase</label>
                <input type="Date" name="pdate" id="pdate" class="form-control">
            </div>
            <div class="form-group">
                <label for="avail">Available</label>
                <input type="text" name="avail" id="avail" class="form-control">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control">
            </div>
            <div class="form-group">
                <label for="cost">Original Cost Each</label>
                <input type="text" name="cost" id="cost" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Selling Price Each</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" name="addNew" class="btn btn-sm mr-2 btn-danger">Submit</button>
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