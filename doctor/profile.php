
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
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -15px;">
                <?php 
                include("./sidenav.php");
                ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                <?php 
                                    $doc= $_SESSION['doctor'];
                                    $query= "SELECT * FROM  doctors WHERE username = '$doc'";
                                    $res = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
                                    $img = $row['profile'];
                                    $firstname = $row['firstname'];
                                    $surname = $row['surname'];
                                    $username = $row['username'];
                                    $gender = $row['gender'];
                                    $country = $row['country'];
                                    $phone = $row['phone'];
                                    $salary = $row['salary'];
                                    $email = $row['email'];
                                    $password= $row['password'];


                                    if(isset($_POST['upload'])){
                                        $uploadImg= $_FILES['img']['name'];
                                        if(empty($uploadImg)){

                                        }
                                        else{
                                            $query= "UPDATE doctors SET profile = '$uploadImg' WHERE username = '$doc'";
                                            $result= mysqli_query($connect,$query);

                                            if($result){
                                                move_uploaded_file($_FILES['img']['tmp_name'],"img/$uploadImg");
                                            }
                                        }
                                    }
                                    ?>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <?php 
                                        echo "<img src='img/$img' class='col-md-12 my-3' style='height: 250px;'>";
                                        
                                        ?><br><br> 
                                        <input type="file" name="img" class="form-control"><br>
                                        <input type="submit" name="upload" value="Update Profile" class="btn btn-success">
                                        
                                    </form>

                                    <div class="my-3">
                                        <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center" colspan="2"> Details</th>
                                        </tr>
                                        <tr><td>Firstname</td> <td><?php echo $firstname; ?></td></tr>
                                        <tr><td>surname</td> <td><?php echo $surname; ?></td></tr>
                                        <tr><td>Username</td> <td><?php echo $username; ?></td></tr>
                                        <tr><td>Gender</td> <td><?php echo $gender; ?></td></tr>
                                        <tr><td>phone No</td> <td><?php echo $phone; ?></td></tr>
                                        <tr><td>Country</td> <td><?php echo $country; ?></td></tr>
                                        <tr><td>email</td> <td><?php echo $email; ?></td></tr>
                                        <tr><td>Salary</td> <td><?php echo $salary; ?></td></tr>
                                        
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php 
                                    if(isset($_POST['change_uname'])){
                                        $updateUname = $_POST['uname'];

                                        if(empty($updateUname)){
                                            echo "<script> alert('Enter Username')</script>";
                                        }
                                        else{
                                            $query ="UPDATE doctors SET username='$updateUname' WHERE username = '$doc'";
                                            $res= mysqli_query($connect,$query);
                                            if($res){
                                                $_SESSION['doctor'] = $updateUname;
                                            }
                                        }
                                    }
                                    
                                    ?>
                                    <h5 class="my-2 text-center">Change Username</h5>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Change Username</label>
                                            <input type="text" name="uname" autocomplete="off" class="form-control">
                                        </div><br>
                                        <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                        
                                    </form><br><br>
                                    <?php 
                                    if(isset($_POST['change_pass'])){
                                        $old_pass = $_POST['old_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];

                                        if($old_pass != $password){

                                        }
                                        else if(empty($new_pass)){

                                        }
                                        else if($new_pass != $con_pass){

                                        }
                                        else{
                                            $query= "UPDATE doctors SET password= '$new_pass' WHERE username = '$doc'";
                                            mysqli_query($connect,$query);
                                        }
                                    }
                                    ?>
                                    <h5 class="text-center">Change Password</h5>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" class="form-control" autocomplete="off" placeholder="Enter Old password" name="old_pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" class="form-control" autocomplete="off" placeholder="Enter New password" name="new_pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" class="form-control" autocomplete="off" placeholder="confirm password" name="con_pass">
                                        </div><br>
                                        <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>