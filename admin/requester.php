<?php 
    define('PAGE1', 'Requester');
    define('PAGE', 'Requester');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white py-2">List Of Requesters</p>
    <?php 
        $sql = "SELECT * FROM requesterlogin_tb";  //r_login_id, r_name, r_email
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo'<table class="table">';
            echo    '<thead>';
            echo        '<tr>';
            echo            '<th>Request Id</th>';
            echo            '<th>Name</th>';
            echo            '<th>Email</th>';
            echo            '<th>Action</th>';
            echo        '</tr>';
            echo    '</thead>';
            echo    '<tbody>';
                            While($row = $result->fetch_assoc()) {
                                echo        '<tr>';
                                echo            '<td>';
                                echo                $row["r_login_id"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["r_name"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["r_email"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                '<form action="editReq.php" method="post" class="d-inline">';
                                echo                    '<input type="hidden" name="id" value= '.$row["r_login_id"].' />
                                                        <button class="btn btn-info mr-2" type="submit" name="edit"><i class="fas fa-pen"></i></button>';
                                echo                '</form>';
                                echo                '<form action="" method="post" class="d-inline">';
                                echo                    '<input type="hidden" name="id" value= '.$row["r_login_id"].' />
                                                        <button class="btn btn-secondary" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>';
                                echo                '</form>';
                                echo             '</td>';
                                echo        '</tr>';
                            }
            echo    '</tbody>';
            echo'</table>';
        }
        else {
            echo "0 Result Found";
        }
    ?>
    <?php 
        if(isset($_REQUEST["delete"])) {
            $sql = "DELETE FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
            if($conn->query($sql)){
                echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
            }
            else {
                echo "<div class='alert alert-danger'>Unable To Delete</div>";
            }
        }
    ?>
<div class="float-right">
        <a href="addNewRequester.php" name="addNewRequester" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
    </div>
</div>
</div>
    </div>
    <!-- Javascript Files -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>
