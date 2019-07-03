<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>FRSC Offenders Tracking System</title>
    </head>
    <body>

<?php 
include("func.php");
if(isset($_POST['offender_search_submit']))
{
    $contact=$_POST['search'];
    $query="SELECT * FROM offendertb WHERE contact='$contact'";
    $result=mysqli_query($con,$query);
    echo  "<div class='container-fluid' style='margin-top:50px;'>
    <div class='card'>
    <div class='card-body'><a href='OffenderDetails.php' class='btn btn-light'>Go Back</a></div>
    <img src='images/adminbg.jpg' class='card-img-top'>
    <div class='card-body' style='background-color:#3498DB;color:#ffffff;'>
                <table class='table table-hover'>
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Contact</th>
                        <th>Plate Number</th>
                        <th>Offence</th>
                        <th>Address</th>
                        <th>Sex</th>
                        <th>Age</th>
                      </tr>
                    </thead>
                    <tbody>";
    while($row=mysqli_fetch_array($result)){
        $fname=$row['fname'];
        $lname=$row['lname'];
        $contact=$row['contact'];
        $platenumber=$row['platenumber'];
        $offence=$row['offence'];
        $address=$row['address'];
        $sex=$row['sex'];
        $age=$row['age'];
        echo "<tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$contact</td>
        <td>$platenumber</td>
        <td>$offence</td>
        <td>$address</td>
        <td>$sex</td>
        <td>$age</td>
      </tr>";
    }
    
        echo "</tbody></table></div></div></div>";
    
}
?>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    </html>


