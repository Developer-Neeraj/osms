<?php 
    define('TITLE', 'Submit Request');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if($_SESSION['isLogin']) {
        $rMail = $_SESSION['rEmail'];
    }
    else {
        echo "<script>location.href='RequesterLogin.php'</script>";
    }
    $sql = "SELECT * FROM Submitrequest_tb WHERE requester_id = {$_SESSION['id']}";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo '
        <div class="col-sm-6 ml-5 mt-5">
            <table class="table">
                <tr>
                    <th scope="row">Request Id</th>
                    <td>'.$row["requester_id"].'</td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td>'.$row["requester_name"].'</td>
                </tr>
                <tr>
                    <th scope="row">Email Id</th>
                    <td>'.$row["requester_email"].'</td>
                </tr>
                <tr>
                    <th scope="row">Request Info</th>
                    <td>'.$row["requester_info"].'</td>
                </tr>
                <tr>
                    <th scope="row">Request Demo</th>
                    <td>'.$row["requester_desc"].'</td>
                </tr>
                <tr>
                    <td>
                        <form class="d-print-none">
                            <input type="submit" class="btn btn-sm btn-danger" value="Print" onClick="window.print()">
                        </form>
                    </td>
                </tr>
            </table>
        </div>';
    } else {
        echo "Failed";
    }
?>
<?php 
    include "includes/footer.php";
?>