<?php
include_once 'core/db.php';

/*
*Get Total Question
*/
$rollno=$_SESSION['RollNo'];
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location:index.php');
}
if(!isset($_SESSION['logi']) || empty($_SESSION['logi']))
{
  header('location:index.php');
}

$_SESSION['log']="";
$_SESSION['logi']="";
$Marks="";
$mar=mysql_query("SELECT Marks FROM sample");
while ($row=mysql_fetch_array($mar)) {
  $Marks=$row["Marks"];
}
$_SESSION["Marks"]=$Marks;
 $duration="";
 $res=mysql_query("SELECT duration FROM sample");
 while ($row=mysql_fetch_array($res)) {
   $duration=$row["duration"];
 }
 $_SESSION["duration"]=$duration;

if(isset($_POST['start'])){
 $_SESSION['score']=0;
  $_SESSION["start_time"]=date("Y-m-d H:i:s");
  $end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
  $_SESSION["end_time"]=$end_time;

  $_SESSION['log']=TRUE;

  header("Location:question.php?n=1");
}
if(isset($_POST['Logout'])){

  $que="DELETE FROM student WHERE RollNo='$rollno'";
  $insert = mysql_query($que);
  header("Location:index.php");
}
$query=mysql_query("SELECT * FROM questions");
$total=mysql_num_rows($query);
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Quizze</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
   .new input[type="submit"]{
   background: #333;
   color: #fff;
   padding: 5px 30px;
   border: 0;
   border-radius:5px;
   margin-top: 0px;
   }
  .new input[type="submit"]:hover
   {
     cursor: pointer;
     background: yellow;
     color: #000;
   }
  </style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>

  <div class="header">
	<div class="container">
    <font color="red">
<marquee behavior="alternate" onMouseOver="this.stop();" onMouseOut="this.start();">	<h2>WELCOME <?php echo $_SESSION['Name'];?></h2></marquee>
</font>
	</div>
</div>
	<div class="content">
	<div class="container">
<font size='05' color="orange">
  <u><h3>Placement Aptitude Test</h3></u>
</font>
  <font size='05'>
<ul>
  <li><strong>Number of Questions:</strong><?php echo $total; ?></li>
	<li><strong>Type:</strong>Multiple Choice</li>
  <li><strong>1 Question:</strong> <?php echo $_SESSION["Marks"] ?> Marks</li>
  <li><strong>Time:</strong> <?php echo $_SESSION["duration"] ?> minutes</li>
</ul>
</font>
<form method="post" action="welcome.php">
<div class="new">
  <input type="submit" name="start" value="Start Quiz" />
<input type="submit" name="Logout" value="Logout" />
</form>
</div>
  </div>
	</div>

</body>
</html>
