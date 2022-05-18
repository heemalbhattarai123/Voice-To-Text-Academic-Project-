<?php
include ("lib/connection.php");
		if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $sqll ="INSERT INTO notifications ( message, date) VALUES ('$message', CURRENT_TIMESTAMP)";
			  $result=mysqli_query($conn,$sqll);
              }


?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 50%; 
  text-align: center;
}

.navbar a:hover {
  background-color: #000;
}


@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}

.up {
  margin: auto;
  width: 100%;
  border: 1px solid #002233;
  padding: 10px;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
}
h2 {
  text-align: center;
  text-color: #ffffff;
  
}
h4 {
  text-align: center;
    text-color: #ffffff;
  }
h3 {
  text-align: center;
    text-color: #000000;
  }
  footer {
  position:fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  padding: 10px;
  color: white;
  text-align: center;
  border: 1px solid #002233;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
}

img {
width:30%

}
.empty {
 margin: auto;
  width: 100%;
  border: 0px;
  padding: 40px;
}

.img3 {
border: 2px solid #002233;
}
.btn {
  background-color: DodgerBlue;
  border: 1px solid #002233;
  
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}
button {
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  border: 1px solid #002233;
  color: #ffffff;
  float:right;
  text-align: right;
  font-size: 16px;
  padding: 12px 20px;
  opacity: 4;
  transition: 0.3s;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 80%;
  
  padding-right: 20px;
  padding-bottom: 50px;
  padding-top: 50px;
  padding-left: 20px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

.submit
{
background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  border: 1px solid #002233;
  color: #ffffff;
  float:right;
  text-align: right;
  font-size: 16px;
  padding: 12px 20px;
  opacity: 4;
  transition: 0.3s;
  padding-right:20px;
  padding-left:20px;
}
.message{
width: 75%;
height: 50px;
}
.section
{
padding-left: 140px;
}
</style>
<title>GADA Technology</title>
</head>
<body>
<div class="up">
<a href ="adminhome.php"><button class="btn" color=" DodgerBlue"><i class="fa fa-home"></i></button></a>

<h2 style="color:white;">Notifications</h2>

</div>
<hr>
<div class="navbar">
  <a href ="adminworkhours.php">Work hours</a>
  <a href ="adminhome.php">Home</a> 
  
</div>
<form method="post" action = "notificationadmin.php">
<h4> Please type in the message that you want to notify the interns. </h4>
<div class="section">
<div class="card">

  <input type="text" id="message" name="message"  class="message">
  <button type="submit" name="submit" class="submit"> send </button>
  
</div>
</div>

<div class="empty"> 
</div>
</form>
<footer>
  <p>Gada Technology </p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%" class="img3"></a>
  
</footer>

</body>
</html>
