

<?php 
include('../include/connection.php');

$query= "SELECT * FROM doctors WHERE status='Pending'  ORDER BY date_reg ASC";
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
    <div class='col-md-12'>
    <div class='row'>
    <div class='col-md-6'>
    <button id='$id'  class='btn btn-success approve'>Approve</button>
    </div>
    <div class='col-md-6'>
    <button id='$id' class='btn btn-danger reject'>Reject</button>
    </div>
    </div>
    </div>
    </td>
    ";
}


echo "
</tr>
</table>
";

?>