<?php
session_start();
include('lib/connection.php');

$username=$_SESSION['username'];

$sql="SELECT * FROM users WHERE Username='$username'";

$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.up {
  margin: auto;
  width: 100%;
  border: 1px solid #002233;
  padding: 5px;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  text-align: center;
  text-color: #ffffff;
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
    text-color: #ffffff;
 }
  
body{
background-color: #005580;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30%;
  
  padding: 0 10px 15px;
}

.row {
  margin: auto;
  width: 100%;
  
  padding: 10px;
  padding-left:100px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 200px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  box-shadow: 0 0 100px -10px black;
    overflow: hidden;
	border-radius: 10%;
	
}
img:hover {
  box-shadow: 0px 0px 5px 5px rgba(0, 140, 220, 0.5);
}

footer {
  position:responsive;
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

button:hover {opacity: 0.6;}

.empty {
 margin: auto;
  width: 100%;
  border: 0px;
  padding: 40px;
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

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
.img3 {
border: 2px solid #002233;

}
</style>
<title>GADA Technology</title>
</head>
<body>
<div class="up">
<a href ="dash.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<a href ="welcome.html"><button> Logout</button></a>
<h2 style="color:white;">Hi  <?php echo $row['FName'];?></h2>
<h4 style="color:white;">WELCOME TO INTERN MATCH</h4>
<h6 style="color:white;">InternID:  <?php echo $row['UserID'];?></h6>
</div>
<hr>
<div class="row">
  <div class="column">
    <div class="card">
      <h4>Profile</h4>
      <a href ="profile.php"><img src = "icons/prof.png" style="width:60%"></a>
    </div>
  </div> 

  <div class="column">
    <div class="card">
      <h4>Record</h4>
      <a href ="record.php"><img src = "icons/record.png" style="width:60%"></a>
    </div>
  </div>
   <div class="column">
    <div class="card">
      <h4>Review</h4>
      <a href ="review.php"><img src = "icons/reviews.png" style="width:60%"></a>
    </div>
  </div>
  </div>
  <div class="row">
  
  <div class="column">
    <div class="card">
      <h4>Work Hours</h4>
      <a href ="workh.php"><img src = "icons/Workh.jpg" style="width:60%"></a>
    </div>
  </div>
  
  <div class="column">
    <div class="card">

				<h4>Notifications</h4>
				
      <a href ="notification.php"><img src = "icons/noti.png" style="width:60%"></a>
    </div>
  </div>
  
  
  
</div>
<div>
</div>

<div class="empty"> 
</div>
<footer>
  <p>Gada Technology </p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%" class="img3"></a>
  
</footer>

</body>
</html>
