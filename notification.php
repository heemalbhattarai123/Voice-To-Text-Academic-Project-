<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE UserName='$username'";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);
$userid = $row['UserID'] ;
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

table {

width: 100%;

  border-collapse: collapse;

  
  max-width: 1600px;
  margin: auto;
  text-align: center;
}

#tt {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tt td, #tt th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tt tr:nth-child(even){background-color: #f2f2f2;}

#tt tr:hover {background-color: #ddd;}

#tt th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #005580;
  color: white;
}
</style>
<title>GADA Technology</title>
</head>
<body>
<div class="up">
<a href ="dash.php"><button class="btn" color=" DodgerBlue"><i class="fa fa-home"></i></button></a>

<h2 style="color:white;">Notifications</h2>

</div>
<hr>
<div class="navbar">
<a href ="workh.php">Work Hours</a>
  <a href ="dash.php">Home</a>
   
  
</div>
<h3> </h3>
<table class="table" id="tt">
<tr>
<th>Date</th>
<th>Notification Received </th>

</tr>
<?php
include('lib/connection.php');

$sql = "SELECT message, date FROM notifications ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["date"]. "</td><td>" . $row['message']."</td></tr>"; 
  }
} else {
  echo "<tr><td>" ."You don't have any notifications."."</td></tr>";
}




?>
</table>



<div class="empty"> 
</div>
<footer>
  <p>Gada Technology </p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%" class="img3"></a>
  
</footer>

</body>
</html>
              