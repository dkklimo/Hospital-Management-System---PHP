
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class= "col-md-6">
                                <h4 class="text-center ">All Admin</h4>

                                <?php 

                                $ad = $_SESSION['admin'];
                                $query = " SELECT * FROM admin WHERE username != '$ad'";
                                $res = mysqli_query($connect, $query);
                                echo"<table class='table table-bordered'>
                                    <tr><th>ID</th>
                                    <th>Username</th>
                                    <th style='width: 10%;'>action</th></tr>
                                ";
                                if(mysqli_num_rows($res) < 1){
                                    echo"<tr><td colspan = '3'>No New Admin</h5></td></tr>";
                                }

                                while($row = mysqli_fetch_array($res)){
                                    $id = $row['id'];
                                    $username = $row['username'];


                                    echo"<tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td><a href='admin?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a></td>
                                    ";
                                }

                                echo"</tr>
                                    </table>
                                ";

                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $query = "DELETE FROM admin WHERE id= '$id'";
                                    mysqli_query($connect,$query);
                                }

                                ?>




                            </div>
                            <div class="col-md-6">

                            <?php 
                             if(isset($_POST['add'])){
                                 $uname= $_POST['uname'];
                                 $pass = $_POST['pass'];
                                 $image =$_FILES['img']['name'];

                                 $error = array();
                                
                                 if(empty($uname)){
                                     $error['u']= "Enter Admin Username";
                                 }
                                 else if (empty($pass)){
                                     $error['u'] = "Enter the Password";
                                 }
                                 else if(empty($image)){
                                     $error ['u']= "Add admin Picture";
                                 }

                                 if(count($error)==0){
                                     $q = " INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";
                                    
                                     $result = mysqli_query($connect, $q);

                                     if($result){
                                         move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                     }
                                     else{

                                     }
                                 }

                             }


                            if(isset( $error['u'])){
                                $sh= $error['u'];
                                $show= "<h4 class='alert alert-danger'> $sh</h4>";
                            }
                            else{
                                $show= "";
                            }
                            
                            ?>
                                <h4>Add Admin</h4>
                                <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php 
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div>
                                        <label for="">Password</label>
                                        <input type="password" name="pass" class= "form-control">
                                    </div> <br>
                                    <div class="form-group">
                                        <label for="">Add Admin Picture</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    
                                        <input type="submit" name="add" value="Add New Admin" class ="btn btn-success">
                                  
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