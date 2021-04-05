<?php 
    define('PAGE1', 'Work');
    define('PAGE', 'work');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
?>
<!-- second column start -->
    <div class="col-sm-9 col-md-10">
    <?php 
        $sql = "SELECT * FROM assignwork_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo '<table class="table mt-5">';
            echo    '<thead>';
            echo        '<tr>';
            echo            '<th scope="col">Req Id</th>';
            echo            '<th scope="col">Req Info</th>';
            echo            '<th scope="col">Name</th>';
            echo            '<th scope="col">Address</th>';
            echo            '<th scope="col">City</th>';
            echo            '<th scope="col">Mobile</th>';
            echo            '<th scope="col">Technician</th>';
            echo            '<th scope="col">Assign Date</th>';
            echo            '<th scope="col">Action</th>';
            echo        '</tr>';
            echo    '</thead>';
            echo    '<tbody>';
                        while($row = $result->fetch_assoc())
                        {
                            echo '<tr>';
                                echo '<td>'. $row["request_id"] .'</td>';
                                echo '<td>'. $row["request_info"] . '</td>';
                                echo '<td>'. $row["request_name"] . '</td>';
                                echo '<td>'. $row["request_add2"] . '</td>';
                                echo '<td>'. $row["request_city"] . '</td>';
                                echo '<td>'. $row["request_mobile"] . '</td>';
                                echo '<td>'. $row["request_assign"] . '</td>';
                                echo '<td>'. $row["request_date"] . '</td>';
                                echo '<td>';
                                    echo '<form action="viewassignWork.php" method="post"  class="d-inline">';
                                    echo    '<input type="hidden" name="id" value='.$row["request_id"].'> <button type="submit" class="btn btn-warning mr-2" name="view">';
                                    echo    '<i class="fas fa-eye"></i>';
                                    echo    '</button>';
                                    echo '</form>';
                                    echo '<form action="" method="post" class="d-inline">';
                                    echo    '<input type="hidden" name="eid" value='.$row["request_id"].'> <button type="submit" class="btn btn-danger ml-2" name="delete" value="close">';
                                    echo    '<i class="fas fa-trash-alt"></i>';
                                    echo    '</button>';
                                    echo '</form>';
                                echo '</td>';
                            echo '</tr>';
                        }
            echo    '</tbody>';
            echo '</table>';

        } else {
            $msg = "<div class='alert alert-info col-sm-6 mt-5 ml-5'>0 Result Found</div>";
        }
    ?>
    <?php 
        if(isset($_REQUEST["delete"])) {
            $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['eid']}";
            if($conn->query($sql) == TRUE) {
                echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
            } else {
                $msg = "<div class='alert alert-info col-sm-6 mt-5 ml-5'>Unable To Delete Data</div>";
            }
        }
        if(isset($msg)) {
            echo $msg;
        }
    ?>
    </div>

<!-- End of second column -->

<?php 
    include "includes/footer.php";
?>
