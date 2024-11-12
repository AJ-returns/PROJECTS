<?php
    $showalert=false;
    $showSignerror=false;
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['s_username'])) {
        require 'partials/_dbconnect.php';

        $username=$_POST['s_username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        $existsql="SELECT * FROM `users` WHERE `Username`='$username'";//check whether username already exists
        $result=mysqli_query($conn,$existsql);
        $num=mysqli_num_rows($result);
        if ($num>0) {
            $showSignerror="Username already exists";
        }
        else{
            if ($password==$cpassword) {
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`Username`, `Password`, `Date`) VALUES ('$username', '$hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                // $sql="INSERT INTO `users` (`Username`, `Password`, `Date`) VALUES ('$username', '$hash', current_timestamp())";
                if ($result) {
                    $showalert=true;
                }
            }
            else {
                $showSignerror="Passwords do not match";
             
            }
        }
    }
?>
<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-dark text-white">
                <h1 class="modal-title fs-5" id="signupmodalLabel">Signup</h1>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/Projects/futsal/index.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" maxlength="30" name="s_username" class="form-control" id="@username"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" maxlength="20" name="password" class="form-control" id="" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" maxlength="20" name="cpassword" class="form-control" id="" required>
                        <div id="emailHelp" class="form-text">Make sure to type the same password.</div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-info  col-md-12">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>