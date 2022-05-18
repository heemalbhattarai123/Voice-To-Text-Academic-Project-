<?php

session_start();

include('lib/connection.php');
if(isset($_POST['submit'])){

$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE UserName='$username'";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);
$userid = $row['UserID'];


$sql="DELETE FROM users, userjournal, useruploads, workhours USING users, userjournal, useruploads, workhours WHERE users.UserID = userjournal.UserID AND userjournal.UserID = useruploads.UserID AND useruploads.UserID = workhours.UserID AND users.UserID='$userid'";

$result=mysqli_query($conn,$sql);

 if($result ){
			header("Location: signup.php");
			
		}  
}
?>
