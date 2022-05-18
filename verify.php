<?php
session_start();
include('lib/connection.php');
             
	if(isset($_GET['activation_code']) && isset($_GET['email']) ){
	$success_message="";
    $error_message1="";
    $error_message2="";	
    $email = mysqli_escape_string($conn,$_GET['email']); // Set email variable
    $activation_code = mysqli_escape_string($conn,$_GET['activation_code']); // Set hash variable
    $sql="SELECT Email, Activation_Code, Active FROM users WHERE Email='$email' AND Activation_Code='$activation_code' AND Active=0";            
    $search = mysqli_query($conn,$sql) or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
		$sql= "UPDATE users SET Active=1 WHERE Email='$email' AND Activation_Code='$activation_code' AND Active=0";
        mysqli_query($conn,$sql) or die(mysql_error());
        $success_message='Your account has been activated, you can now login.';
    }else{
        // No match -> invalid url or account has already been activated.
        $error_message1= 'The url is either invalid or you already have activated your account.';
    }
}                 
else{
    // Invalid approach
    $error_message2= 'Invalid approach, please use the link that has been send to your email.';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>

.card {
   box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
  padding-top: 10px;
  padding-bottom:20px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
button{
 background-color: DodgerBlue;
  border: 1px solid #002233;
  width:70px;
  color: white;
  padding: 0px 2px;
  height: 30px;
  font-size: 16px;
  cursor: pointer;
  
  

}
</style>
<title>Verification Page</title>
<body>
<div class="card">
<div id="section">
<h2> Please verify here </h2>
  <a href="signin.php"><button class="loginbutton" type="submit">Sign In</button></a><br><br>
	<div class="verification"><?php if(isset($success_message))
	{echo $success_message;}
	
	if(isset($error_message1))
	{
		echo $error_message1;
	}
	if(isset($error_message2))
	{
		echo $error_message2;
	}
	?></div>
</div>  
</div>
	
	
</body>
</head>
</html>