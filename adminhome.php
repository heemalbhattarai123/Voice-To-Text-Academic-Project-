<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.up {
  margin: auto;
  width: 100%;
  border: 1px solid #002233;
  padding: 5px;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  text-align: center;
  text-color: #ffffff;
}
h2 {
  text-align: center;
  text-color: #ffffff;
  
}
h4 {
  text-align: center;
    text-color: #ffffff;
  }
  
 h3 {
 text-align: center;
    text-color: #ffffff;
 }
  
body{
background-color: #005580;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30%;
  text-align: center;
  padding: 120px 0px 0px 70px;
}

.row {
  margin: auto;
  width: 100%;
  text-align: center;
  padding: 10px;
  padding-left:100px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 200px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 10px;
  text-align: center;
  background-color: #f1f1f1;
  box-shadow: 0 0 100px -10px black;
    overflow: hidden;
	border-radius: 10%;
	
}
img:hover {
  box-shadow: 0px 0px 5px 5px rgba(0, 140, 220, 0.5);
}

footer {
  position:fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  padding: 5px;
  color: white;
  text-align: center;
  border: 1px solid #002233;
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
}


img {
width:10%

}
button {
  background: linear-gradient(to bottom, #003366 0%, #006699 100%);
  border: 1px solid #002233;
  color: #ffffff;
  float:right;
  text-align: right;
  font-size: 16px;
  padding: 12px 20px;
  opacity: 4;
  transition: 0.3s;
}

button:hover {opacity: 0.6;}

.empty {
 margin: auto;
  width: 100%;
  border: 0px;
  padding: 120px;
}
.btn {
  background-color: DodgerBlue;
  border: 1px solid #002233;
  
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  float:left;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
.img3 {
border: 2px solid #002233;

}
</style>
<title>GADA Technology</title>
</head>
<body>
<div class="up">
<a href ="adminhome.php"><button class="btn"><i class="fa fa-home"></i></button></a>
<a href ="welcome.html"><button> Logout</button></a>
<h2 style="color:white;">ADMIN</h2>
<h4 style="color:white;">WELCOME TO INTERN MATCH</h4>
</div>
<hr>

  <div class="column">
    <div class="card">
      <h3>Interns</h3>
      <a href ="adminintern.php"><img src = "icons/att.png" style="width:40%"></a>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>work Hours</h3>
      <a href ="adminworkhours.php"><img src = "icons/Workh.jpg" style="width:40%"></a>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <h3>Notifications</h3>
      <a href ="notificationadmin.php"><img src = "icons/noti.png" style="width:40%"></a>
    </div>
  </div>
</div>
<div>
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
