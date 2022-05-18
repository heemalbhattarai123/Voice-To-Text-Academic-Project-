<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    text-color: #000000;
  }
  h3 {
  text-align: center;
    text-color: #002233;
  }
  h5 {
  text-align: center;
    text-color: #002233;
  }
  
body{
background-color: #ffffff;
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
  width:30px;
  color: white;
  padding: 0px 2px;
  height: 30px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}
button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  text-align: center;
  cursor: pointer;
  width: 32.5%;
  font-size: 18px;
  border: 1px solid #002233; 
  height:50px;
}
button:hover, a:hover {
  opacity: 0.7;
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
  text-align: left;
  background-color: #005580;
  color: white;
}
  </style>
</head>
<title>GADA Technology</title>
<body>

<div class="up">
<a href ="adminhome.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<h2 style="color:white;">Intern Details</h2>


</div>
<hr>
<div class="navbar">
<a href ="adminhome.php">Home</a> 
  <a href ="adminworkhours.php">Work Hours</a>
  
</div>
<hr>
<table class="table" id="tt">
<tr>
<th>InternID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Phone</th>
<th>Email</th>
</tr>
<?php
include('lib/connection.php');
$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");


while($row = mysqli_fetch_assoc($result)){
echo "<tr><td>" . $row["UserID"]. "</td><td>" . $row["FName"] . "</td><td>". $row["LName"]."</td><td>" . $row["DOB"] ."</td><td>" . $row["Gender"] . "</td><td>" . $row["Phone"] ."</td><td>" . $row["Email"] ."</td></tr>";
}
echo "</table>";


?>
</table>

<footer>
  
  
  <p>Gada Technology</p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%"></a>
  
</footer>               
</html>