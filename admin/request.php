<?php 
    define('PAGE1', 'Requests');
    define('PAGE', 'request');
    include "includes/header.php";
    include "../dbconnection.php";
    session_start();
    if(isset($_SESSION['aLogin'])) {
        $aMail = $_SESSION['aEmail'];
    } else {
        echo "<script> location.href='adminLogin.php' </script>";
    }
?>

<div class="col-sm-4 mb-5">
    <?php 
        $sql = "SELECT requester_id, requester_info, requester_desc, requester_date FROM submitrequest_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card mt-5 mx-5">';
                echo    '<div class="card-header">';
                echo        'Request Id: '. $row["requester_id"];
                echo    '</div>';
                echo     '<div class="card-body">';
                echo            '<h5 class="card-title">';
                echo                    'Request Info: '. $row["requester_info"];
                echo            '</h5>';
                echo            '<p class="card-text">';
                echo                $row['requester_desc'];
                echo            '</p>';
                echo            '<p class="card-text">';
                echo               'Request Date: '. $row['requester_date'];
                echo            '</p>';
                echo            '<form action="" method="post" class="float-right">';
                echo                '<input type="text" name="id" hidden value='. $row["requester_id"];
                echo                '>';
                echo                '<input type="submit" value="view" class="btn btn-sm mr-2 btn-secondary">';
                echo                '<input type="submit" name="close" value="Close" class="btn btn-sm ml-2 btn-danger">';
                echo            '</form>';
                echo        "</div>";
                echo    "</div>";                
            }
        }
    ?>
</div>

<?php 
    include "assignwork.php";
    include "includes/footer.php";
?>