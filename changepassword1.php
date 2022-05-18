<?php
session_start();
$error="";
if(isset($_POST['submit']))
{
include('lib/connection.php');

if($_POST['newpassword']==$_POST['confirmpassword'])
{

$username=$_SESSION['username'];

$confirmpassword=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirmpassword']),FILTER_SANITIZE_STRIPPED));


$hash_password = hash('sha256', $confirmpassword);

$sql="UPDATE users SET Password='$hash_password' WHERE Username='$username'";

$result=mysqli_query($conn,$sql);


}
else{
	$error = "The Passwords doesn't match each other";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    text-color: #ffffff;
  }
  
body{
background-color: #ffffff;
}

.card {
  box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
  padding-top: 10px;
}

.title {
  color: grey;
  font-size: 18px;
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
  width: 80%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
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
.btn {
  background-color: DodgerBlue;
  border: 1px solid #002233;
  width:30px;
  color: white;
  padding: 4px 4px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}
.txt
{
	Width: 40%;
	height: 30px;
}

.card {
  box-shadow: 4px 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  border: 1px solid #002233;
  height: 500px;
}

.card:hover {
  box-shadow: 16px 16px 16px 0 rgba(0,0,0,0.2);
}
</style>

<title>GADA Technology</title>
</head>
<body>
	
	<div class="card">
	<div id="section">
		<form method="post" action="changepassword1.php">
		<h1>Edit Password</h1> <hr> <br><br><br>
		<p> Please type your new password below </p>
		<input type="password" class="txt" name="newpassword" placeholder="new password" required />
		<input type="password" class="txt" name="confirmpassword" placeholder="confirm password" required /> <br><br> <br><br>
		<a href="changepassword1.php"><button type="submit" name="submit">Change Password</button></a><br><br>
		<span style="color:white;"><?php if(isset($error)){echo $error;}?></span>
		</form>
		<a href="profile.php"><button class="loginbutton" type="submit">Profile</button></a><br><br>
		
		<?php if(isset($result))
	{
		echo "Your Password has been changed successfully!";
		die();
	}
	?>
	
	</div>
	</div>
</body>
</html>