<?php 
    define('PAGE1', 'Sell Report');
    define('PAGE', 'sellReport');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
?>

<div class="col-md-10 col-sm-9 text-center">
        <form action="" method="post" class="ml-5 mt-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" name="StartDate" id="" class="form-control">
                </div>
                    <span>To</span>
                <div class="form-group col-md-2">
                    <input type="date" name="EndDate" id="" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="SearchData" id="SearchData" value="Search" class="btn btn-secondary">
                </div>
            </div>
        </form>
        <?php 
            if(isset($_REQUEST['SearchData'])) {
                $StartDate = $_REQUEST['StartDate'];  
                $EndDate = $_REQUEST['EndDate']; 
                $sql = "SELECT * FROM customer_tb WHERE cpsdate BETWEEN '$StartDate' AND '$EndDate'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    echo '<p class="py-2 bg-dark mt-5 text-white">Details</p>';
                    echo '<table class="table">';
                    echo    '<thead>';
                    echo        '<tr>';
                                    echo '<th scope="col">Customer Id</th>';
                                    echo '<th scope="col">Name</th>';
                                    echo '<th scope="col">Address</th>';
                                    echo '<th scope="col">Product Name</th>';
                                    echo '<th scope="col">Quantity</th>';
                                    echo '<th scope="col">Selling Price Each</th>';
                                    echo '<th scope="col">Total Price</th>';
                                    echo '<th scope="col">Date</th>';
                    echo        '</tr>';
                    echo    '</thead>';
                    echo    '<tbody>';
                                while($row = $result->fetch_assoc()) {
                    echo        '<tr>';
                    echo            '<th scope="row">';
                    echo               $row['cId']; 
                    echo            '</th>';
                    echo            '<td>';
                    echo               $row['cname']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cadd']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cpname']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cpquantity']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cpeach']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cptotal']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['cpsdate']; 
                    echo            '</td>';
                    echo         '</tr>';
                                }
                    echo    '</tbody>';
                    echo '</table>';
                }
                else {
                    $msg = "<div class='alert alert-warning col-sm-3 mt-5 ml-5'>0 Result Found</div>";
                }
            }

        ?>
        <?php 
            if(isset($msg)) {
                echo $msg;
            }
        ?>
</div>

<?php 
    include "includes/footer.php";
?>