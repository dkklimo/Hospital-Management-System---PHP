<?php 
session_start();
include("./include/connection.php");

if(isset($_POST['login'])){
    $username= $_POST['uname'];
    $password= $_POST['pass'];

    $error = array();

    $q="SELECT * FROM doctors WHERE username ='$username' AND password='$password'";
    $qq= mysqli_query($connect,$q);

    $row = mysqli_fetch_array($qq);

    if(empty($username)){
        $error['login']= "Enter Username";
    }
    else if(empty($password)){
        $error['login']= "Enter Password";
    }

    else if($row['status']=='pending'){
        $error['login']= "Kindly Wait for Admin to Approve";
    }
    else if($row['status']=='rejected'){
        $error['login']="Try again Later";
    }

    if(count($error)==0){

        $query ="SELECT * FROM doctors WHERE username = '$username' AND password= '$password'";
        $res = mysqli_query($connect,$query);

        if(mysqli_num_rows($res)){
            echo "<script> alert('Done')</script>";
            header("Location:doctor/index.php ");
           $_SESSION['doctor']= $username;
        }
        else{
            echo "<script> alert('Failed')</script>";
        }
    }


}

if(isset($error['login'])){
    $er = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
}
else{
    $show ="";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
</head>
<body style="background-image: url(./img/doctorbg); background-size:cover; background-repeat:no-repeat;" >
    <?php 
    include("./include/header.php");
    ?>

    <div class="container-fliud">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light my-5 p-4">
                    <h4 class="text-center my-2">Doctors Login</h4>
                    <?php echo $show; ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" autocomplete="off" placeholder="Enter Username" class="form-control">
                        </div>
                        <div class= "form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" placeholder="Enter Password" class="form-control">
                        </div><br>
                        <input type="submit" name="login" value="Login" class="btn btn-success">
                        <p>I don't have an Account <a href="./apply.php">Apply Now!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>