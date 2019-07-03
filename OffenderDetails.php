<?php

$con=mysqli_connect("localhost","root","","frscdb");
if(isset($_POST['offenderDetails'])){
 $query="SELECT * FROM offendertb";
 $result=mysqli_query($con,$query);
    echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
    <style>
   table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}  
table{
width: 100%;
}
   </style>
  <body style="background-color:#3498DB;color:white;text-align:center;padding-top:50px;">
  <div class="container" style="text-align:left;">
  <center><h3>Offenders Records</h3></center><br>
   <center><a href="admin-panel.php"  class="btn btn-outline-light">Return to admin panel</a></center><br><br>
  <table class="table table-hover table table-bordered">
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
        <th>Payment</th>
    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $contact=$row['contact'];
    $platenumber=$row['platenumber'];
    $offence=$row['offence'];
    $address=$row['address'];
    $sex=$row['sex'];
    $age=$row['age'];
    $payment=$row['payment'];
    echo '<tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$contact.'</td>
      <td>'.$platenumber.'</td>
      <td>'.$offence.'</td>
      <td>'.$address.'</td>
      <td>'.$sex.'</td>
      <td>'.$age.'</td>
      <td>'.$payment.'</td>
    </tr>';
  }
echo '</tbody></table></div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>';
}

?>