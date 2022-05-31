<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
</head>
<body style="background-image: url(./img/doctorbg); background-size:cover;background-repeat:no-repeat;">
    <?php 
    include("./include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light my-5 p-4">
                    <h5 class="text-center">Patient Login</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" autocomplete="off" placeholder="Enter Username" class="form-control">
                        </div>
                        <div class= "form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" placeholder="Enter Password" class="form-control">
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-info my-3">
                        <p>I don't have an Account <a href="./account.php">Create Account!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>