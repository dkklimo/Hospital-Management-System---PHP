
<?php 
 include("./include/connection.php");


 if(isset($_POST['apply'])){
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username =$_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
      $error['apply'] = "Enter First Name";
    }
    else if(empty($surname)){
      $error['apply'] ="Enter Surname";
    }
    else if(empty($username)){
      $error['apply'] ="Enter Username";
    }
    else if(empty($email)){
      $error['apply'] ="Enter Email";
    }
    else if(empty($gender)){
      $error['apply'] ="Select Gender";
    }
    else if(empty($phone)){
      $error['apply'] ="Enter Phone Number";
    }
    else if(empty($country)){
      $error['apply'] ="Select Country";
    }
    else if(empty($password)){
      $error['apply'] ="Enter Password";
    }
    else if(empty($confirm_password)){
      $error['apply'] ="Confirm Password";
    }
    else if($password != $confirm_password){
      $error['apply']= "Both Passwords do not Match";
    }


    if(count($error)==0){
      $query = "INSERT INTO doctors(firstname,surname,username,password,email,gender,phone,country,salary,date_reg,status,profile) VALUES('$firstname','$surname','$username','$password','$email','$gender','$phone','$country','0',NOW(),'Pending','profile.jpg')";
      $result= mysqli_query($connect,$query);
      if($result){
        echo "<script> alert('Successfully Applied')</script>";
        header("Location: doctorlogin.php");
      }
      else{
        echo "<script> alert('Failed')</script>";
      }
    }

 }

 if(isset($error['apply'])){
   $s = $error['apply'];
    $show ="<h5 class='text-center alert alert-danger'>$s</h5>";
 }
  else{
    $show = "";
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body style="background-image: url(./img/doctorbg); background-size:cover; background-repeat:no-repeat;">
 <?php 
   include("./include/header.php");
 ?>    
 <div class="container-fluid">
   <div class="col-md-12">
     <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6 my-3 p-4 bg-light">
         <h5 class="text-center">Apply Now!!</h5>
         <?php echo $show; ?>
         <form action="" method="POST">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" name="fname" autocomplete="off" class="form-control" placeholder="Enter Firt Name" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
            </div>
            <div class="form-group">
              <label for="">Surname</label>
              <input type="text" name="sname" autocomplete="off" class="form-control" placeholder="Enter the Surname"value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="uname" autocomplete="off" class="form-control" placeholder="Enter the Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
            </div>
            <div class="form-group">
              <label for="">Email Address</label>
              <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
            </div><br>
            <div class="form-group">
              <label for="">Select Gender</label>
              <select name="gender" id="" class="form-control">
                <option value="">Select Gender</option>
                <option value="male"> Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Phone No.</label>
              <input type="number" name="phone" autocomplete="off" class="form-control" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
            </div><br>
            <div class="form-group">
              <label for="">Select Country</label>
              <select name="country" id="" class="form-control">
                <option value="">Select Country</option>
                <option value="usa"> U.S.A</option>
                <option value="kenya">Kenya</option>
                <option value="uk">United Kingdom</option>
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
            <input type="submit" name="apply" value="Apply Now!!" class="btn btn-success"><br>
            <p>I already Have an Account <a href="./doctorlogin.php"> Login</a></p>
         </form>
       </div>
       <div class="col-md3"></div>
     </div>
   </div>

 </div>
</body>
</html>