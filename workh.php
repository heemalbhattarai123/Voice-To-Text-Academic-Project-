<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE UserName='$username'";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);
$userid = $row['UserID'] ;

if(isset($_POST['submit']))
{
$date=mysqli_escape_string($conn,filter_var(strip_tags($_POST['Date']),FILTER_SANITIZE_STRIPPED));
$signin=mysqli_escape_string($conn,filter_var(strip_tags($_POST['signin']),FILTER_SANITIZE_STRIPPED));
$signout=mysqli_escape_string($conn,filter_var(strip_tags($_POST['signout']),FILTER_SANITIZE_STRIPPED));
$sqll="INSERT INTO workhours (UserID, Date, SignIn, SignOut) VALUES ('$userid', '$date','$signin','$signout')";
$resultt=mysqli_query($conn,$sqll);
$sql2 = "UPDATE workhours SET HoursWorked = TIMESTAMPDIFF(HOUR,SignIn,SignOut)";
$result1=mysqli_query($conn,$sql2);

}



?>


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
.empty {
 margin: auto;
  width: 100%;
  border: 0px;
  padding: 40px;
}

.img3 {
border: 2px solid #002233;
}
body {font-family: Arial;}

body {font-family: Arial;}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: center;
}
table {
width: 100%;
border: 1px solid black;
  border-collapse: collapse;

  
  max-width: 1600px;
  margin: auto;
  text-align: center;
}
.btn {
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  border: 1px solid #002233;
  width:30px;
  color: white;
  padding: 0px 2px;
  height: 30px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}

.Button
{
padding-left: 125px;

color: white;
}
.button1
{

background: linear-gradient(to bottom, #003366 0%, #006699 100%);
color: white;
width:150px;
height: 40px;
}
</style>
<title>GADA Technology</title>
</head>

<body>

<div class="up">
<a href ="dash.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<h2 style="color:white;">Work Hours</h2>


</div>
<form method = "POST" action="workh.php">
<hr>
<div class="navbar">
  <a href ="review.php">Review</a>
  <a href ="notification.php">Notifications</a> 
  
</div>
<br><br>
<table style="width:80%">
  
    <tr>
      <th>Select Date</th>
      <th>Sign In</th>
      <th>Sign Out</th>
      
    </tr>
    <tr>
      
	  
	  <td>
	  <input type="date" id="Date" name="Date" ></td>
      <td>
          <input type="time" id="sgnin" name="signin" >
        </td>
      <td>
        <input type="time" id="sgnout" name="signout">
      </td></td>
      
      
    </tr>
    
  </table>
  <br>
  <div class="Button">
  <input type="submit" value="Save" name="submit" class="button1">
  <input type="submit" value="View" name="view" class="button1">
  </div>
  <p> <b>My Daily Work Hours: </b></P>
<?php 
				$total = 0;
				if(isset($_POST['view']))
					{
						$sq = "SELECT * FROM workhours WHERE UserID = '$userid'";
						$resulttt=mysqli_query($conn,$sq) or die("Your query is not correct");
						while($row = mysqli_fetch_array($resulttt, MYSQLI_NUM))
							{
								echo "You have worked ".($row[5]). " hours in " . ($row[2])."."; 
								echo nl2br("\n");
								
							$total += $row[5]; 
								
							}

					}
				?> 
<h5>Total Work Hours: <?php echo $total; ?> 
</h5>

<div class="empty"> 
</div>
<footer>
  <p>Gada Technology </p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%" class="img3"></a>
  
</footer>

</form>
</body>
</html>