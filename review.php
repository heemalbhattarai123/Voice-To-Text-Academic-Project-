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
$test=mysqli_escape_string($conn,filter_var(strip_tags($_POST['test']),FILTER_SANITIZE_STRIPPED));
$sqll="INSERT INTO userjournal (UserID, Journal) VALUES ('$userid', '$test')";
$resultt=mysqli_query($conn,$sqll);
}


?>


<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
        <link rel="stylesheet" href="styles.css">
		
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
  
.container {
padding-top:20px;
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


.empty {
 margin: auto;
  width: 100%;
  border: 0px;
  padding: 40px;
}
.border {
padding-left: 6px;
padding-right:6px;
padding-top:6px;
}
img {
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

</style>
        
  <title>GADA Technology</title>     

</head>
<body>

<div class="border">	
<div class="up">
<a href ="dash.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<h2 style="color:white;">Review</h2>
</div>
<hr>
<div class="navbar">
  <a href ="record.php">Record</a>
  <a href ="workh.php">Work Hours</a> 
  
</div>
        <div class="container">

            
          
            

    <form method = "post" action="review.php">       

            <div class="app"> 
                <h3>Review your journal here: </h3>
                <div class="input-single">
                    
					<textarea id="test" placeholder="Paste your journal here for review" name = "test"></textarea>
                </div>         
               
                  <button type = "submit"id="save-note-btn" name="submit">Save your Journal</button>
				  <button type = "submit"id="view-journal" name="view">View your Journal</button><br><br>
                
                <h3>My Reviewed Journal</h3>
				<?php 
				
				if(isset($_POST['view']))
					{
						$sq = "SELECT * FROM userjournal WHERE UserID = '$userid'";
						$resulttt=mysqli_query($conn,$sq) or die("Your query is not correct");
						while($row = mysqli_fetch_array($resulttt, MYSQLI_NUM))
							{
								echo($row[2]); 
								echo nl2br("\n");
							}

					}
				?> 
				
				
            </div>

        </div>
		
		<div class="empty"> 
</div>

          
		
<footer>
  
  
  <p>Gada Technology</p>
  <a href="https://edugrowth.org.au/project/internmatch/">
  <img src="icons/im.jpg" style="width:5%"></a>
  
</footer>
</div>

       
        
</form>
</body>
</html>
