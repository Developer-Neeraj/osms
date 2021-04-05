<?php 
    define('PAGE1', 'Work Report');
    define('PAGE', 'workReport');
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
                    <input type="submit" name="SearchButton" id="SearchData" value="Search" class="btn btn-secondary">
                </div>
            </div>
        </form>
        <?php 
            if(isset($_REQUEST['SearchButton'])) {
                $StartDate = $_REQUEST['StartDate'];  
                $EndDate = $_REQUEST['EndDate']; 
                $sql = "SELECT * FROM assignwork_tb WHERE request_date BETWEEN '$StartDate' AND '$EndDate'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    echo '<p class="py-2 bg-dark mt-5 text-white">Details</p>';
                    echo '<table class="table">';
                    echo    '<thead>';
                    echo        '<tr>';
                                    echo '<th scope="col">Req Id</th>';
                                    echo '<th scope="col">Request Info</th>';
                                    echo '<th scope="col">Name</th>';
                                    echo '<th scope="col">Address</th>';
                                    echo '<th scope="col">City</th>';
                                    echo '<th scope="col">Mobile</th>';
                                    echo '<th scope="col">Technician</th>';
                                    echo '<th scope="col">Assign Date</th>';
                    echo        '</tr>';
                    echo    '</thead>';
                    echo    '<tbody>';
                                while($row = $result->fetch_assoc()) {
                    echo        '<tr>';
                    echo            '<th scope="row">';
                    echo               $row['request_id']; 
                    echo            '</th>';
                    echo            '<td>';
                    echo               $row['request_info']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_name']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_add1']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_city']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_mobile']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_assign']; 
                    echo            '</td>';
                    echo            '<td>';
                    echo               $row['request_date']; 
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