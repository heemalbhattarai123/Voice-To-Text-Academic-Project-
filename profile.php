<?php
session_start();
include('lib/connection.php');
$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE UserName='$username'";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);




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
  width: 100%;
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
.upload{
	border: 3px solid #002233;
	width: 200px;
	height: 200px;
}
.br{
	width:50px;
	text-align:center;
	padding-left: 170px;
}
</style>
<title>GADA Technology</title>
</head>
<body>
<div class="up">
<a href ="dash.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<h2 style="color:white;">Hi <?php echo $row['FName'];?> </h2>

</div>
<hr>
<div class="navbar">
  <a href ="dash.php">Home</a>
  <a href ="record.php">Record</a> 
  
</div>

<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     
     



<div class="card">
 
     <?php 
	 $username=$_SESSION['username'];
		$sql="SELECT * FROM users WHERE UserName='$username'";
		$result=mysqli_query($conn,$sql) or die("Your query is not correct");
		$row=mysqli_fetch_array($result);
		$userid = $row['UserID'];
          $query = "SELECT * FROM useruploads WHERE UserID = '$userid' ORDER BY id DESC";
          $res = mysqli_query($conn,  $query);
			$images = mysqli_fetch_assoc($res);
          if (mysqli_num_rows($res) > 0) {
          	 ?>
             
  <img src="uploads/<?=$images['Images']?>" class="upload" >
		  <?php } else{
			  ?>
	<img src="icons/prof2.png" class="upload" >		  
  <?php  }?>
  <form action="upload.php"
           method="post"
           enctype="multipart/form-data"> <br>
<div class="br">
           <input type="file" 
                  name="my_image">
				  <br> <br>

           <input type="submit" 
                  name="submit"
                  value="Upload">
 </div>    	
   <h1>Profile Details</h1>
  <p> <b>First Name</b>: <?php echo $row['FName'];?> </p>
  <p> <b>Last Name:</b> <?php echo $row['LName'];?> </p>
  <p> <b>Intern ID:</b> <?php echo $row['UserID'];?> </p>
  <p> <b>Email: </b><?php echo $row['Email'];?> </p>
   <p> <b>Phone Number: </b><?php echo $row['Phone'];?> </p>
   </form >
   
 <a href="changepassword1.php"><button type="submit"> Change Password</button></a>
 
 <form method = "post" action = "deleteaccount.php">
 
   <p><button type="submit" name ="submit">Delete Account</button></p>
   
 
 
  </form>
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
