<?php 
session_start();
$con=mysqli_connect("localhost","root","","frscdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin-panel.php");
	}
	else
		header("Location:error.php");
}

if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="UPDATE offendertb SET payment='$status' WHERE contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}



function get_offender_details(){
    global $con;
    $query="SELECT * FROM offendertb";
    $result=mysqli_query($con,$query);
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
        
        echo "<tr>
                <td>$fname</td>
                <td>$lname</td>
                <td>$contact</td>
                <td>$platenumber</td>
                <td>$offence</td>
                <td>$address</td>
                <td>$sex</td>
                <td>$age</td>
                <td>$payment</td>
            </tr>";

    }
}



function display_admin_panel(){
    echo '
    
    <!DOCTYPE html>
<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>FRSC Offenders Tracking System</title>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>FRSC Offenders Tracking System </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="enter contact number" aria-lable="Search" name="contact">
                    <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
                </form>
            </div>
        </nav>
    </head>
    <style type="text/css">
        button:hover{cursor: pointer;}
        #inputbtn:hover{cursor: pointer;}
    </style>
    <body style="padding-top:50px;">
    <div class="jumbotron" id="ab1"></div>
   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Add New Offender</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Update Payment Status</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Offender Details</a>
      <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Offence Sheet</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Generate Bill</a>
    </div><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an Offender Record</h4></center><br>
              <form class="form-group" method="post" action="addOffender.php">
                <div class="row">
                  <div class="col-md-4"><label>First Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="fname"></div><br><br>
                  <div class="col-md-4"><label>Last Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="lname"></div><br><br>
                  <div class="col-md-4"><label>Contact:</label></div>
                  <div class="col-md-8"><input type="text" name="contact" class="form-control"></div><br><br>
                  <div class="col-md-4"><label>Plate Number:</label></div>
                  <div class="col-md-8"><input type="text" name="platenumber" class="form-control"></div><br><br>
                  <div class="col-md-4"><label>Offence:</label></div>
                  <div class="col-md-8"><input type="text" name="offence" class="form-control"></div><br><br>
                  <div class="col-md-4"><label>Address:</label></div>
                  <div class="col-md-8"><input type="text" name="address" class="form-control"></div><br><br>
                  <div class="col-md-4"><label>Sex:</label></div>
                  <div class="col-md-8"><label class="checkbox-inline"><input type="checkbox" name="sex" value="M">Male</label><label class="checkbox-inline"><input type="checkbox" name="sex" value="F">Female</label></div><br>             
                  <div class="col-md-4"><label>Age:</label></div>
                  <div class="col-md-8"><input type="text" name="age" class="form-control"></div><br><br>
                     <div class="col-md-4"><label>Payment:</label></div>
                  <div class="col-md-8">
                                <select name="payment" class="form-control" >
                                <option value="Paid">Paid</option>
                                <option value="Not Paid">Not Paid</option>
                                </select>
                                </div><br><br><br>
                  <div class="col-md-4">
                  <input type="submit" class="btn btn-primary" name="btnsubmit" value="Create new entry">                 
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-body">
            <form class="form-group" method="post" action="func.php">
              <input type="text" name="contact" class="form-control" placeholder="enter contact"><br>
              <select name="status" class="form-control">
                <option value="Paid">Paid</option>
                <option value="Not Paid">Not Paid</option>
              </select><br><hr>
              <input type="submit" value="update" name="update_data" class="btn btn-primary">
            </form>
          </div>
        </div><br><br>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
      <form class="form-group" method="post" action="OffenderDetails.php">
          <label><h3>Click This Button To View Records</h3></label><br>
          <input type="submit" name="offenderDetails" value="View Offender Records" class="btn btn-primary">
        </form>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">
        <form class="form-group" method="post" action="viewOffence.php">
          <label><h3>Click This Button To View Offence Sheet</h3></label><br>
          <input type="submit" name="viewOffence" value="View Offence Sheet" class="btn btn-primary">
        </form>
       </div>
      
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
            <form class="form-group" method="POST" action="offenceSheet.php">
            <fieldset class="fieldset"><legend style="text-align:center;font-weight:bold">NOTICE OF OFFENCE SHEET </legend><p>Pursuant To Sections 10(4),28(2) of FRSC (Establishment Act. 2007 & Regulation 220 of NRTR, 2012)
            

            <div class="col-md-8"><input type="text" class="form-control" placeholder="Name Of Offender" name="names"></div><br>
            <div class="col-md-8"><input type="text" class="form-control" placeholder="Address" name="address"></div><br>
            <div class="col-md-8"><input type="text" class="form-control" placeholder="Telephone No" name="telephone"></div><br><hr>
            
            <legend style="text-align:center;font-weight:bold">VEHICLE</legend>
            <table border="0" cellspacing="2" cellpadding="2" width="100%">
		<tr>
        <td style="text-align:right">REG. NO:</td>
		<td><input type="text" name="regno" required>
        <td style="text-align:right">COLOR:</td>
		<td><input type="text" name="color" required>
        </tr>
        	<tr>
        <td style="text-align:right">TYPE:</td>
		<td><input type="text" name="type" required>
        <td style="text-align:right">MAKE:</td>
		<td><input type="text" name="make" required>
        </tr>
        </table>
		<br>  
        <hr>
        <legend style="text-align:center;font-weight:bold">OFFENCES</legend>
            <table border="0" cellspacing="2" cellpadding="2" width="100%">
		<tr>
        <td style="text-align:right">CODE:</td>
		<td><input type="text" name="code" required>
        <td style="text-align:right">LOCATION:</td>
		<td><input type="text" name="location" required>
        </tr>
        	<tr>
        <td style="text-align:right">ROUTE:</td>
		<td><input type="text" name="route" required>
        <td style="text-align:right">DATE:</td>
		<td><input type="text" name="dt1" required>
        </tr>
        </table>
        <br>  
        <hr>
        <legend style="text-align:center;font-weight:bold">DRIVERS LICENCE</legend>
            <table border="0" cellspacing="2" cellpadding="2" width="100%">
		<tr>
        <td style="text-align:right">NUMBER:</td>
		<td><input type="text" name="number" required>
        <td style="text-align:right">DATE ISSUED:</td>
		<td><input type="text" name="dateissued" required>
        <td style="text-align:right">RENEWAL DATE:</td>
		<td><input type="text" name="renewaldt" required>
        </tr>
        <tr>
        
        <td style="text-align:right">EXPIRY DATE:</td>
		<td><input type="text" name="expiry" required>
        <td style="text-align:right">ISSUING STATE:</td>
		<td><input type="text" name="issuing" required>
        </tr>
        </table>
        <br>  
        <hr>
        <legend style="text-align:center;font-weight:bold">CONFISTICATION</legend>
            <table border="0" cellspacing="2" cellpadding="2" width="100%">
		<tr>
        <td style="text-align:right">VEHICLE LICENCE:</td>
		<td><input type="text" name="licence" required>
        <td style="text-align:right">ID CARD:</td>
		<td><input type="text" name="idcard" required>
        <td style="text-align:right">DRIVERS LICENCE:</td>
		<td><input type="text" name="drivers" required>
        </tr>
        <tr>
        
        <td style="text-align:right">VEHICLE KEY:</td>
		<td><input type="text" name="key1" required>
        <td style="text-align:right">INSURANCE:</td>
		<td><input type="text" name="insurance" required>
        <td style="text-align:right">PASSPOT:</td>
		<td><input type="text" name="passport" required>
        </tr>
        </table>
         <hr>
            
            <legend style="text-align:center;font-weight:bold">CAUTION</legend>
            <div class="col-sm-12">
                        
                    <p>If you do not wish to be PROSECUTED, then pay the prescribed penality to the specified bank and present the original teller to FRSC Office (See details overleaf).</p>
                    <p>This notice of Offences expires after 7 days from the date of issue, you may be PROSECUTED.</p>
            </div>
            
		<br>
		<br>
        <div class="col-md-4">
                  <input type="submit" class="btn btn-primary" name="btnsubmt" value="Submit">                 
                  </div>
        
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
    </div>
  </div>
</div>
   </div>
        
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
    </body>
</html>';
}

 ?>
