<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

    <link rel="stylesheet" type= "text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>HMS</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Hospital Management System</h5>
        <div class="ms-auto"></div>
        <ul class="navbar-nav">
            <?php 
            
            if(isset($_SESSION['admin'])){

                $user= $_SESSION['admin'];
                echo'
                <li class="nav-item"><a class="nav-link text-white" href=""> '.$user.' </a></li>
                <li class="nav-item"><a class="nav-link text-white" href="logout.php"> Logout</a></li>
                
                ';
            }
            else if(isset($_SESSION['doctor'])){
                $user= $_SESSION['doctor'];
                echo'
                <li class="nav-item"><a class="nav-link text-white" href=""> '.$user.' </a></li>
                <li class="nav-item"><a class="nav-link text-white" href="logout.php"> Logout</a></li>
                
                ';
            }
            else{
                echo'
                <li class="nav-item"><a class="nav-link text-white" href="../hms/index.php"> Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../hms/adminlogin.php"> Admin</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="doctorlogin.php"> Doctor</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="patientlogin.php"> Patient</a></li>  
                ';
            }
            ?>
        </ul>
    </nav>
</body>
</html>