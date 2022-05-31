<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php 
        include('../include/header.php');
        include('../include/connection.php');

        $ad = $_SESSION['admin'];
        $query = " SELECT * from admin WHERE username = '$ad'";

        $res = mysqli_query($connect,$query);

        while($row=mysqli_fetch_array($res)){
            $username = $row['username'];
            $profile =$row['profile'];
        }
    ?>

    <div class="container-fluid">
        <div class ="col-md-12">
            <div class ="row">
                 <div class = "col-md-2" style="margin-left:-15px;">
                     <?php 
                        include('./sidenav.php');
                      ?>
                 </div>

                 <div class="col-md-10">
                     <div class="col-md-12">
                         <div class= "row">
                             <div class="col-md-6">
                                 <h4> <?php echo $username; ?> Profile</h4>

                                 <?php 
                                    if(isset($_POST['update'])){
                                        $profile= $_FILES['profile']['name'];
                                        if(empty($profile)){


                                        }
                                        else {
                                            $query = "UPDATE admin SET profile = '$profile' WHERE username = '$ad'";
                                            $result = mysqli_query($connect, $query);

                                            if($result){
                                                move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                            }
                                        }
                                    }
                                 ?>

                                 <form action="" method="post" enctype="multipart/form-data">
                                     <?php echo "<img src='img/$profile' class ='col-md-12' style='height: 200px;'>"
                                     ?>
                                     <br><br>
                                     <div class="form-group">
                                         <label for=""> Update Profile</label>
                                         <input type="file" name="profile" class="form-control">
                                     </div>
                                     <br><br>
                                     <input type="Submit" name="update" value="UPDATE" class="btn btn-success" >
                                 </form>
                             </div>
                             <div class="col-md-6">
                                 <?php 
                                    if(isset($_POST['change'])){
                                        $uname = $_POST['change'];

                                        if(empty($uname)){

                                        }
                                        else{
                                            $query = "UPDATE admin SET username = '$uname' WHERE username ='$ad' ";

                                            $res= mysqli_query($connect,$query);

                                            if($res){
                                                $_SESSION['admin'] = $uname;
                                            }

                                        }
                                    }
                                 
                                 ?>
                                    <form action="" method="post" >
                                        <div class="form-group">
                                            <label for="">Change Username</label>
                                            <input type="text" name="change" class="form-control" autocomplete="off">
                                        </div><br>
                                        <input type="submit" class="btn btn-success" value="Change">
                                    </form>
                                    <br><br>
                                    <?php 
                                        if(isset($_POST['update_pass'])){
                                        $old_pass = $_POST["old_pass"];
                                        $new_pass = $_POST["new_pass"];
                                        $con_pass = $_POST["con_pass"];

                                        $error= array();

                                        $old = mysqli_query($connect, "SELECT * FROM admin WHERE username ='$ad'");
                                        $row =mysqli_fetch_array($old);
                                        $pass= $row['password'];

                                        if(empty($old_pass)){
                                            $error['p']= "Enter Old Password";
                                        }
                                        else if(empty($new_pass)){
                                            $error['p']= "Enter New Password";
                                        }
                                        else if(empty($con_pass)){
                                            $error['p']= "Confirm Password";
                                        }
                                        else if($old_pass==$pass){
                                            $error['p']="Invalid Password";
                                        }
                                        else if($new_pass != $con_pass){
                                            $error['p']="Both password does not match";
                                        }

                                        if(count($error)==0){
                                            $query= "UPDATE admin SET password = '$new_pass' WHERE username ='$ad'";
                                            mysqli_query($connect,$query);
                                        }

                                        }
                                        if(isset($error['p'])){
                                            $e = $error['p'];

                                            $show ="<h5 class ='text-center alert alert-danger'>$e</h5>";
                                        }

                                        else{
                                            $show ="";
                                        }
                                    ?>

                                    <form action="" method="POST">
                                        <h5 class="text-center my-4">Change Password</h5>
                                        <div><?php echo $show; ?></div>
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" name="old_pass" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" name="new_pass" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="con_pass" class="form-control">
                                        </div><br>
                                        <input type="submit" name="update_pass" value="Change Password" class="btn btn-info">
                                    </form>
                             </div>

                             

                         </div>
                     </div>

                 </div>
            </div>
        </div>
    </div>
</body>
</html>