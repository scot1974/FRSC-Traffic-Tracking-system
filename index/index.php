<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="backend/css/bootstrap.css">
   

	
   
   
</head>
    
<body style="background-image: url('images/bg1.jpg')">
<div class="container-fluid">
<br>
<nav class="navbar navbar-inverse ">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	     <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
                              
      </button>
      <a class="navbar-brand" >FRSC Offenders Tracking  System</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
                 <li class="active"><a href="index.php">Home</a></li>      
		        <li><a href="info.php#motv">About Us</a></li>
		        <li><a href="info.php#conn">Contact Us</a></li>
		        <li><a href="login.php">Admin Panel</a></li>
      </ul>
      
    </div> 
</nav>
<br>


  

 <div class="row" >  
  <div class="col-md-3"> <iframe src="eli.php" height="308" style="border:none;"></iframe></div>
    <div class="col-md-6">
	<!-- Slide Show -->
          <img class="mySlides" src="images/1.jpg" style="width:100%; height:308px ">
          <img class="mySlides" src="images/traffic1.jpg" style="width:100%; height:308px">
          <img class="mySlides" src="images/traffi.jpg" style="width:100%; height:308px">
           <img class="mySlides" src="images/traffic3.jpg" style="width:100%; height:308px">
           <img class="mySlides" src="images/traffic4.jpg" style="width:100%; height:308px">

    </div>

  
  <div class="col-md-3"> <iframe src="neli.php" height="308"  style="border:none;"></iframe></div>
</div>
  <br><br>
  <div style=" margin: 0;
    background-color: rgba(176, 75, 80, 0.2);
    text-align: center; padding: 5px 0px;">
    <form action=""  method="post">
    <label></label>
	
    </form>
</div>
<br>



<footer  style="text-align:center">
 <small>&copy; Copyright 2019  info@frsc.gov.ng</small>
</footer>
  
<script>
// Automatic Slideshow - change image every 1.5 seconds
var myIndex=0;
slide();
function slide()
{
    var i;
    var x=document.getElementsByClassName("mySlides");
    for(i=0; i<x.length; i++)
        {
            x[i].style.display="none";
        }
    myIndex++;
    if(myIndex>x.length)
        {
            myIndex=1;
        }
    x[myIndex-1].style.display="block";
    setTimeout(slide,1500);
}
</script>
</div>
</body>
</html>
