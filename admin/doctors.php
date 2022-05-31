<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>
    <?php 
    include("../include/connection.php");
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
                    <h5 class="text-center my-3">Total Doctors</h5>
                    <?php 
                    $query= "SELECT * FROM doctors WHERE status='approved'  ORDER BY date_reg ASC";
                    $res = mysqli_query($connect, $query);
                    

                                            echo "
                        <table class='table table-bordered' >
                        <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>surname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                        </tr>


                        ";

                        if(mysqli_num_rows($res)< 1){

                        echo "<tr>
                        <td colspan='10'>No jobs Request</td>
                        </tr>";
                        }


                        while($row=mysqli_fetch_array($res)){
                            $id = $row['id'];
                            $firstname = $row['firstname'];
                            $surname = $row['surname'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $gender = $row['gender'];
                            $phone = $row['phone'];
                            $country = $row['country'];
                            $date_reg = $row['date_reg'];

                            echo "
                            <tr>
                            <td>$id</td>
                            <td>$firstname</td>
                            <td>$surname</td>
                            <td>$username</td>
                            <td>$email</td>
                            <td>$gender</td>
                            <td>$phone</td>
                            <td>$country</td>
                            <td> $date_reg</td>
                            <td>
                            <a href='edit.php?id=$id'><button class='btn btn-success edit'>Edit</button></a>
                            </td> 
                            ";
                        }


                        echo "
                        </tr>
                        </table>
                        ";
                    ?>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>