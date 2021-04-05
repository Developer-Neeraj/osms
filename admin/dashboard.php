<?php 
    define('PAGE1', 'Dashboard');
    define('PAGE', 'dashboard');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
    $sql = "SELECT MAX(requester_id) FROM submitrequest_tb";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $submitRequest = $row[0];

    $sql = "SELECT MAX(rno) FROM assignwork_tb";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $assignWork = $row[0];

    $sql = "SELECT MAX(empId) FROM technician_tb";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $technician = $row[0];
?>

<!-- =====Start Dashboard 2st column-->

<div class="col-sm-9 col-md-10">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card bg-danger text-white mb-3" style="width: 18rem;">
                <div class="card-header">Request Received</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submitRequest; ?></h4>
                    <a href="requester.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card bg-success text-white mb-3" style="width: 18rem;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $assignWork; ?></h4>
                    <a href="work.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card bg-info text-white mb-3" style="width: 18rem;">
                <div class="card-header">No. Of Technician</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $technician; ?></h4>
                    <a href="technique.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white py-2">List Of Requester</p>
        <?php 
                        $sql = "SELECT * FROM requesterlogin_tb";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            echo '
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Requester Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo    "<th scope='row'>".$row['r_login_id']."</th>";
                                            echo    "<td>".$row['r_name']."</td>";
                                            echo    "<td>".$row['r_email']."</td>";
                                            echo "</tr>";
                                        }
                                    '</tbody>
                                </table>
                            ';
                        }
                        else {
                            echo "0 Result";
                        }
                    ?>
    </div>
</div>

<!-- =====End Dashboard 2st column-->
<?php 
    include "includes/footer.php";
?>