<?php 
    define('PAGE', 'asset');
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

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white py-2">Product/Parts Details</p>
    <?php 
        $sql = "SELECT * FROM assets_tb"; 
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo'<table class="table">';
            echo    '<thead>';
            echo        '<tr>';
            echo            '<th scope="col">Product Id</th>';
            echo            '<th>Name</th>';
            echo            '<th>DOP</th>';
            echo            '<th>Available</th>';
            echo            '<th>Total</th>';
            echo            '<th>Original Cost Each</th>';
            echo            '<th>Selling Price Each</th>';
            echo            '<th>Action</th>';
            echo        '</tr>';
            echo    '</thead>';
            echo    '<tbody>';
                            While($row = $result->fetch_assoc()) {
                                echo        '<tr>';
                                echo            '<th scope="row">';
                                echo                $row["prod_Id"];
                                echo             '</th>';
                                echo            '<td>';
                                echo                $row["prod_name"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["prod_dop"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["prod_avail"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["prod_total"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["prod_cost"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                $row["prod_price"];
                                echo             '</td>';
                                echo            '<td>';
                                echo                '<form action="editproduct.php" method="post" class="d-inline">';
                                echo                    '<input type="hidden" name="id" value= '.$row["prod_Id"].' />
                                                        <button class="btn btn-info mr-2" type="submit" name="edit"><i class="fas fa-pen"></i></button>';
                                echo                '</form>';
                                echo                '<form action="" method="post" class="d-inline">';
                                echo                    '<input type="hidden" name="id" value= '.$row["prod_Id"].' />
                                                        <button class="btn btn-secondary" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>';
                                echo                '</form>';
                                echo                '<form action="sellProduct.php" method="post" class="d-inline">';
                                echo                    '<input type="hidden" name="id" value= '.$row["prod_Id"].' />
                                                        <button class="btn btn-success ml-2" type="submit" name="issue"><i class="fas fa-handshake"></i></button>';
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
            $sql = "DELETE FROM assets_tb WHERE prod_Id = {$_REQUEST['id']}";
            if($conn->query($sql)){
                echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
            }
            else {
                echo "<div class='alert alert-danger'>Unable To Delete</div>";
            }
        }
    ?>
<div class="float-right">
        <a href="addNewProduct.php" name="newEmp" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
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