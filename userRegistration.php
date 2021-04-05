<?php 
    include "dbconnection.php";
    if(isset($_REQUEST["signup"])) {
        if(($_REQUEST["rName"] == "") || ($_REQUEST["rMail"] == "") || ($_REQUEST["rPass"] == "")) {
            $regmess = '<div class="alert alert-warning mt-2 role="alert">All field are required</div>';
        } 
        else {
            $sq = "SELECT r_email FROM requesterlogin_tb WHERE r_email = '".$_REQUEST["rMail"]."'";
            $result = $conn->query($sq);
            if($result->num_rows==1) {
                $regmess = '<div class="alert alert-warning mt-2 role="alert">Email Account Already Exist</div>';
            } 
            else {
                $rname = $_REQUEST["rName"];
                $rmail = $_REQUEST["rMail"];
                $rpass = $_REQUEST["rPass"];
                $sq = "INSERT INTO `requesterlogin_tb` (`r_name`, `r_email`, `r_password`) VALUES ('$rname', '$rmail', '$rpass')";
                if($conn->query($sq) == true) {
                    $regmess = '<div class="alert alert-warning mt-2 role="alert">Account Create successfully</div>';
                } else {
                    $regmess = '<div class="alert alert-warning mt-2 role="alert">Unable to create Account</div>';
                }
            }
        }
    }
?>
        <div class="container pt-5">
            <h2 class="text-center">Create An Account</h2>
            <div class="row my-5">
                <div class="col-md-6 offset-md-3">
                    <form action="" class="shadow-lg p-4" method="post">
                        <div class="form-group">
                            <i class="fas fa-user"></i><label for="name" class="pl-2">Name</label>
                            <input type="text" name="rName" id="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-user"></i><label for="mail" class="pl-2">Email</label>
                            <input type="email" name="rMail" id="mail" placeholder="Email" class="form-control">
                            <small class="form-text">We will never share your email with anyone else</small>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="pass" class="pl-2">Password</label>
                            <input type="password" name="rPass" id="pass" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger btn-block shadow-sm mt-5 font-weight-bold" name="signup">Sign up</button>
                        <em style="font-size: 10px">Note - By clicking Sign up, You agree to our Terms, Data Policy and cookies Policy</em>
                        <?php if(isset($regmess)) {
                            echo $regmess;
                        } ?>
                    </form>
                </div>
            </div>
        </div>