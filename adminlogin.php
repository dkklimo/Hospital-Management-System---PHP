<?php 
    session_start();
    include("./include/connection.php");
    if( isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $error = array();
        if(empty($username)) {
            $error['admin'] = 'Enter Your Username';
        }
        else if(empty($password)){
            $error['admin']= 'Enter Your password';
        }
        if(count($error)==0){
            $query= "SELECT * FROM admin WHERE username= '$username' AND password='$password'";

            $result = mysqli_query( $connect, $query);

            if(mysqli_num_rows($result) == 1){
                echo " <script> alert('You have successfully login as Admin)</script>";

                $_SESSION['admin'] = $username;

                header("location: admin/index.php");
                exit();
            }
            else{
                echo " <script> alert('Invalid Username or Password')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image:url(img/back.jpg);background-repeat:no-repeat; background-size:cover; background-position: center center;">
    <?php 
    include("include/header.php");
    
    ?>
<div style="margin-top:30px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light p-5">
                    <img src="img/images.jpg" class= "col-md-12"alt="">
                    <form method="post" class="my-2">
                        <div>
                            <?php 
                            if(isset( $error['admin'])){
                                $sh= $error['admin'];
                                $show= "<h4 class='alert alert-danger'> $sh</h4>";
                            }
                            else{
                                $show= "";
                            }
                            echo $show;
                            
                            ?>

                        </div>
                        <div class="form-group">
                            <label class="text-white" for="">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Your Username" autocomplete="off">
                        </div>
                        <div>
                            <label class="text-white" for="">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>

                        <input style="margin-top:30px;" type="submit" name="login" class="btn btn-success" value="login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>