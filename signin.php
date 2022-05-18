<?php
if(isset($_POST['submit']))
{
session_start();	
include('lib/connection.php');


$success="";
$error="";

if(empty($_POST['username']) || empty($_POST['password']))
{
	$error="Please enter all the details first";
}
else{
$username=$_POST['username'];
$password=$_POST['password'];	
$username=mysqli_escape_string($conn,filter_var(strip_tags($username),FILTER_SANITIZE_STRIPPED));
$password=mysqli_escape_string($conn,filter_var(strip_tags($password),FILTER_SANITIZE_STRIPPED));

$hash_password = hash('sha256', $password);

$sql="SELECT * FROM users WHERE UserName='$username' AND Password='$hash_password'";

$result=mysqli_query($conn,$sql) or die("Your query is not right");

$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);

if($count==1)
{
	if($row['Active']==0)
	{
		$error = "Please activate your Account first !!!";
	}
	else{
		$_SESSION['username']=$username;
			if(isset($_POST["rememberme"])) {
				setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
				header('Location:dash.php');
			} else {
				header('Location:dash.php');
				if(isset($_COOKIE["username"])) {
					setcookie ("username","");}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");}
			}
	}
}
if($count==0)
{
	$error = "Either Username or Password is incorrect. Please try again...";
}
}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.button {
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.signinbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  border:none;
  color: white;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .signinbtn {
     width: 100%;
  }
}
</style>
<title>GADA Technology</title>
</head>
<body>


<form action="signin.php" method="post">
  <div class="imgcontainer">
    <img src="icons/gada.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];}?>" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>" placeholder="Enter Password" name="password" required >
        
    <button type="submit" name="submit" class="button">Login</button>
    <label>
      <input type="checkbox"  name="rememberme"> Remember me
    </label>
	
	<p><a  href="forgotpassword1.php"> Forgot Password?</a></p>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
	<p>Don't have an account?</p>
	<a href="signup.php"><button type="button" class="signinbtn">Sign Up Here</button></a>
    
  </div>
  
</form>
<span><?php if(isset($error))
		{
			echo $error;
		}
		?>
	</span>

</body>
</html>