<?php

session_start();
$success="";
$error="";
if(isset($_POST['submit']))
{
	if(isset($_POST['email']))
	{
		include('lib/connection.php');
		$email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_VALIDATE_EMAIL));
		$sql="SELECT Email FROM users WHERE Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			$error="This email address doesn't exist on our records. Please type a valid Email!";
		}
		else{
		$code=rand(999,999999);
		$password_code=$email.$code;
		$hash_password = hash('sha256', $password_code);
		
		require 'scripts/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'h.bhattarai2000@gmail.com';                 // SMTP username
        $mail->Password = 'Him@l321';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
     
        $mail->setFrom('h.bhattarai2000@gmail.com', 'GADA Technology');
        $mail->addAddress($email);     // Add a recipient

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'New Password for Your Account';
		$mail->Body = "
		
		<br><br><br><br>
		This is the New Password for you. Log in with that and change it any time in Profile section.<br><br><br><br>
		$password_code<br><br><br><br>
		
		Please click this link to Login into your Account ------------------<br><br><br><br>
		
		<a href='http://localhost/GadaTechnology/signin.php'>Click here to Log in to your Account</a>";

		if($mail->send())
		{
			$sql="UPDATE users SET Password='$hash_password' WHERE Email='$email'";
			$result=mysqli_query($conn,$sql);
			$success="Please check your email to access temporary password.";
		}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
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
  padding-left: 10px;
padding-right: 10px;
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
  width:20px;
  color: white;
  padding: 4px 4px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}
.card {
  box-shadow: 4px 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 90%;
  border: 1px solid #002233;
  height: 500px;
}

.card:hover {
  box-shadow: 16px 16px 16px 0 rgba(0,0,0,0.2);
}
.txt
{
	Width: 40%;
	height: 30px;
}

</style>
<title>GADA Technology</title>
</head>
<body>

<div class="card">
  <div id="section">
		<form action="" method="post">
		<h1>Forgot Password?</h1> <hr> <br> <br> <br> <br>
		<form method="post" action="forgotpassword1.php">
		<p> Please type your Email here </p>
		<input type="email" class="txt" name="email" placeholder="Email"/>
		<br><br><br><br>
		<button type="submit" name="submit">Submit</button><br><br>
		</form>
		<a href="signin.php"><button class="loginbutton" type="submit">Sign In</button></a><br><br>
		<?php if(isset($success)){ echo $success;}?></span>
		<?php if(isset($error)){ echo $error;}?></span>
		
	</div>
  
</div>
	
	
</body>
</html>