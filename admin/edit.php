<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
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
                <h5 class="text-center">Edit Doctor</h5>
                <?php 
                if(isset($_GET['id'])){
                    $id= $_GET['id'];

                    $query= "SELECT * FROM doctors WHERE id= '$id'";
                    $res= mysqli_query($connect,$query);
                    
                    $row= mysqli_fetch_array($res);

                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $gender = $row['gender'];
                    $salary= $row['salary'];
                    $phone = $row['phone'];
                    $country = $row['country'];
                    $date_reg = $row['date_reg'];

                }

                if(isset($_POST['update'])){
                    $updatesalary= $_POST['salary'];
                    
                    $q= "UPDATE doctors SET salary= '$updatesalary' WHERE id='$id'";

                    mysqli_query($connect, $q);

                }
                ?>
        
                <div class="row" >
                    <div class="col-md-8">
                        <h5 class="text-left">First Name:<?php echo $firstname; ?></h5>
                        <h5 class="text-left">Surname:<?php echo $surname; ?></h5>
                        <h5 class="text-left">Username:<?php echo $username; ?></h5>
                        <h5 class="text-left">Email:<?php echo $email; ?></h5>
                        <h5 class="text-left">Gender:<?php echo $gender; ?></h5>
                        <h5 class="text-left">Salary:<?php echo $salary; ?></h5>
                        <h5 class="text-left">Phone:<?php echo $phone; ?></h5>
                        <h5 class="text-left">Country:<?php echo $country; ?></h5>
                        <h5 class="left">Date Registered<?php echo $date_reg; ?></h5>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-center my-4">Update Doctors Salary</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">Salary</label>
                                <input type="number" name="salary" autocomplete="off" class="form-control" value='<?php echo $salary; ?>'>
                                
                            </div>

                            <input type="submit" class="btn btn-info my-3" name="update" value="Update Salary">
                            
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>