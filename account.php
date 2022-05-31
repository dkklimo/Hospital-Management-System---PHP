<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
</head>
<body style="background-image: url(./img/doctorbg); background-size:cover; background-repeat:no-repeat;">
    <?php 
    include("./include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light my-5 p-3">
                    <h5 class="text-center">Create Account</h5>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" autocomplete="off" name="fname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" class="form-control" autocomplete="off" name="sname" placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" autocomplete="off" name="uname" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" autocomplete="off" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" autocomplete="off" name="phone" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male"> Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="">Select Country</option>
                                <option value="male"> U.S.A</option>
                                <option value="female">Kenya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" autocomplete="off" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="con_pass" autocomplete="off" class="form-control" placeholder="Confirm Password">
                        </div><br>
                        <input type="submit" name="apply" value="Create Account" class="btn btn-info"><br>
                        <p>I already Have an Account <a href="./patientlogin.php"> Login</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>