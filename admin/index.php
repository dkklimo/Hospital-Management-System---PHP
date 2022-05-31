<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php 
        include('../include/header.php');
        include('../include/connection.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class = "col-md-2" style="margin-left: -15px;">
                    <?php 
                    include('./sidenav.php');
                    ?>
                </div>
                <div class ="col-md-10">
                    <h4 class="my-3">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class= " row">
                            <div class="col-md-3 bg-success mx-1" style="height: 130px;">
                                <div class="col-md-12">

                                    <?php 
                                        $ad = mysqli_query($connect, "SELECT * FROM admin");
                                        $num = mysqli_num_rows($ad);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-center text-white my-2" style="font-size:30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href=""><i class="fa fa-user-cog fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="col-md-3 bg-info mx-1" style="height: 130px;">
                            <?php 
                            
                            $doc = "SELECT * FROM doctors WHERE status='approved'";
                            $doc_res= mysqli_query($connect,$doc);
                            $num_doc=mysqli_num_rows($doc_res);

                            ?>
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-center text-white my-2" style="font-size:30px;"><?php echo $num_doc; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="./doctors.php"><i class="fa fa-user-md fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="col-md-3 bg-warning mx-1" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-center text-white my-2" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Patients</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href=""><i class="fa fa-procedures fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="col-md-3 bg-danger my-2 mx-1" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-center text-white my-2" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href=""><i class="fa fa-flag fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="col-md-3 bg-success my-2 mx-1" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            $job=mysqli_query($connect,"SELECT * FROM doctors  WHERE status='pending'");
                                            $num1= mysqli_num_rows($job);
                                            ?>
                                            <h5 class="text-center text-white my-2" style="font-size:30px;"> <?php echo $num1; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Job Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="job_request.php"><i class="fa fa-book-open fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
                                </div>
                        
                        </div>
                            <div class="col-md-3 bg-info my-2 mx-1" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-center text-white my-2" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class= "text-white"> Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href=""><i class="fa fa-money-check-alt fa-3x text-white my-4"></i></a>

                                        </div>
                                    </div>
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