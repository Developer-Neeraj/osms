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

<?php 
    if(isset($_REQUEST['addNew'])) {
        if(($_REQUEST['Rname'] == "") || ($_REQUEST['Rcity'] == "") || ($_REQUEST['Rmobile'] == "") || ($_REQUEST['email'] == "")) {
            $msg = "<div class='alert alert-danger col-sm-6 mt-4'>Fill All Filled</div>";
        } else {
            $name = $_REQUEST['Rname'];
            $city = $_REQUEST['Rcity'];
            $mobile = $_REQUEST['Rmobile'];
            $email = $_REQUEST['email'];
            $sql = "INSERT INTO technician_tb (empName, empCity, empMobile, empEmail) VALUES ('$name', '$city', '$mobile', '$email')";
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
        <h3 class="text-center">Add New Technician</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="Rname">Name</label>
                <input type="text" name="Rname" id="Rname" class="form-control">
            </div>
            <div class="form-group">
                <label for="Rnae">City</label>
                <input type="text" name="Rcity" id="Rnae" class="form-control">
            </div>
            <div class="form-group">
                <label for="Rnam">Mobile</label>
                <input type="text" name="Rmobile" id="Rnam" class="form-control">
            </div>
            <div class="form-group">
                <label for="Remail">Email</label>
                <input type="email" name="email" id="Remail" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" name="addNew" class="btn btn-sm mr-2 btn-danger">Submit</button>
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