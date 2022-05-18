<?php
session_start();
$error="";
if(isset($_POST['submit']))
{
include('lib/connection.php');
include('lib/function.php');


$email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
$fname=mysqli_escape_string($conn,filter_var(strip_tags($_POST['fname']),FILTER_SANITIZE_STRIPPED));
$lname=mysqli_escape_string($conn,filter_var(strip_tags($_POST['lname']),FILTER_SANITIZE_STRIPPED));
$birthday=mysqli_escape_string($conn,filter_var(strip_tags($_POST['birthday']),FILTER_SANITIZE_STRIPPED));
$gender=mysqli_escape_string($conn,filter_var(strip_tags($_POST['gender']),FILTER_SANITIZE_STRIPPED));
$phone=mysqli_escape_string($conn,filter_var(strip_tags($_POST['phone']),FILTER_SANITIZE_STRIPPED));
$username=mysqli_escape_string($conn,filter_var(strip_tags($_POST['username']),FILTER_SANITIZE_STRIPPED));
$password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));



$hash_password = hash('sha256', $password);

$activation_code = hash('sha256',rand(0,1000));

    $sql="SELECT UserName FROM users WHERE UserName='$username'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$error="UserName already Exists";
	}
	$sql="SELECT Email FROM users WHERE Email='$email'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$error.="And Email already exists";
	}
    if(empty($error))
	{
	$user_id = random_num(6);
	$sql="INSERT INTO users (UserID, FName,LName,DOB,Gender,Phone,UserName,Email,Activation_Code,Password) VALUES('$user_id','$fname','$lname','$birthday','$gender','$phone','$username','$email','$activation_code','$hash_password')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
	$_SESSION['UserID']=$user_id;
	$_SESSION['fname']=$fname;
	$_SESSION['lname']=$lname;
	$_SESSION['birthday']=$birthday;
	$_SESSION['gender']=$gender;
	$_SESSION['phone']=$phone;
	$_SESSION['email']=$email;	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['hash_password']=$hash_password;
	$_SESSION['activation_code']=$activation_code;
	$message="Please check your email to activate your account";
	include('activateemail.php');
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
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  color: white;
  padding: 14px 20px;
  margin: 8px 4px;
  cursor: pointer;
  width: 47%;
  opacity: 0.9;
  border: 0px solid #555555;
  transition-duration: 0.2s;
  
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #668cff;
}

h2 {
  text-align: center;
}


/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .updatebtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Sign Up (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Sign Up Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
  
  .container {
  padding: 10px;
}
}
</style>
<title>GADA Technology</title>
</head>
<body>
<h2>Sign Up</h2>


 
  
      <hr>
<form method="post" action="signup.php" style="border:1px solid #ccc">
  <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

<label for=“fname”><b>First Name</b></label>
      <input type="text" id=“fname” placeholder="Enter First Name" name="fname" class="txt" required><br><br>

<label for=“lname”><b>Last Name</b></label>
      <input type="text" id=“lname” placeholder="Enter Last Name" name="lname" class="txt" required><br><br>


<label for="birthday"><b>Date of Birth</b></label>
  <input type="date" id="birthday" name="birthday"><br><br>

<label for=“gender”><b>Gender</b></label><br>
<input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label><br><br>


<label for="phone"><b>Phone Number<b/></label><br><br>
  <input type="tel" id="phone" name="phone" placeholder="+6144-454-678" required><br><br>


      <label for="username"><b>Username</b></label>
      <input type="text" class="txt" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" class="txt" placeholder="Enter Password" name="password" required>
    

      <div class="clearfix">
        <a href="signin.php"><button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name= "submit" class="signupbtn">Sign Up</button><br>
		
		
     
    
 

      </div>
	  <span class="text"><?php if(isset($message)) {echo $message;}?></span>
		<span class="text"><?php if(isset($error)){ echo $error ;}?></span>
 </div>
</form>

</body>
</html>