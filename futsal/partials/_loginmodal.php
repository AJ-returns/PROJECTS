<?php
    
    $login=false;
    $showlogerror=false;
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['l_username'])) {
        require 'partials/_dbconnect.php';
        $username=$_POST['l_username'];
        $password=$_POST['password'];
        
        //sql query to fetch any username that matches
        $sql="SELECT * FROM `users` WHERE `Username`='$username'";

        //run query
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
          while($row=mysqli_fetch_assoc($result)) {
                if (password_verify($password,$row['Password'])) {
                    $login=true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['l_username']=$username;
                    // header("location:about.php");
                    // exit();
                }
                else {
                    $showlogerror="Invalid Credentials";
                }
          }
        }
        else{
            $showlogerror="Invalid Credentials";

        }
    }
 ?>

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="loginmodalLabel">Login</h1>
                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/Projects/futsal/index.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="l_username" id="@username"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info  col-md-12">Login</button>
                    </div>
                    <br>
                    <br>
                </form>
                <div class="container">
                    Don't have an account? <br>
                    <button class="btn btn-outline-info my-2 col-md-12" data-bs-toggle="modal"
                        data-bs-target="#signupmodal">Create an account</button>
                </div>
            </div>
        </div>
    </div>
</div>