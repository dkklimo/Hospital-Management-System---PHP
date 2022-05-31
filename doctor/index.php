
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
</head>

<body>
    <?php
    include("../include/header.php");
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
                        <h5>Doctors Dashboard</h5>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 my-3 bg-info" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#"><i class="fa fa-user-circle text-white fa-3x my-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3 bg-warning mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-2" style="font-size: 30px;">0</h5>
                                                <h5 class="text-white my-2">Total</h5>
                                                <h5 class="text-white my-2">Patients</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#"><i class="fa fa-bed-pulse text-white fa-3x my-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3 bg-success mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-2" style="font-size: 30px;">0</h5>
                                                <h5 class="text-white my-2">Total</h5>
                                                <h5 class="text-white my-2">Appointments</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#"><i class="fa fa-calendar text-white fa-3x my-3"></i></a>
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
    </div>
</body>

</html>