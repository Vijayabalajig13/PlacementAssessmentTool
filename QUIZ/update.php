<?php

include 'core/db.php';

if(!isset($_SESSION['logged']) || empty($_SESSION['logged']))
{
  header('location:admin.php');
}
if(isset($_POST['Reset'])){
  if(empty($_POST['RollNo'])){
$msg = 'RollNo is required';
  }
  else {
  $roll =$_POST['RollNo'];
  $msg = 'Reset successfully';
mysql_query("DELETE FROM student WHERE RollNo= '$roll' ");
}
}
if(isset($_POST['Timer'])){
  if(empty($_POST['Time'])){
$msg = 'Enter time';
  }
  else {
  $msg = 'Time update successfully';
  $time =$_POST['Time'];
mysql_query("UPDATE sample SET duration=$time");
}
}
if(isset($_POST['pass'])){
  if(empty($_POST['password'])){
$msg = 'Enter password';
  }
  else {
  $msg = 'Password reset successfully';
  $pass =$_POST['password'];
mysql_query("UPDATE admin SET pwd='$pass'");
}
}
if(isset($_POST['Back'])){
  header("Location:ad.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
 <title>Quiz</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <style>
 .container input[type="text"]
 {
   border-radius: 10px;
   border-bottom: 1px solid #ff;
   height: 40px;
   width:150px;
   font-size: 16px;
 }
 .container input[type="submit"]
 {
   border: none;
   outline: none;
   height: 32px;
   width: 150px;
   font-size: 16px;
 }
.up
{
  padding-left: 100px;
}
 </style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
   <div class="content">
   <div class="container">
    <u><font size='04'> <h3>Reset</h3></font></u>
        <form method="post" action="update.php">
       <p>
   <font size='05' face='Times New Roman' >    <label>RollNo:</label>
         <input type="text" value="" name="RollNo" placeholder="Enter RollNo" />
         <input type="submit" name="Reset" value="Reset" />
         <font size='05' face='Times New Roman' > <br> <br>  <label>Timer:</label>
               <input type="text" value="" name="Time" placeholder="Set Time" />
               <input type="submit" name="Timer" value="Set" />
         <font size='05' face='Times New Roman' > <br> <br>  <label>Password:</label>
               <input type="text" value="" name="password" placeholder="Enter new password" />
              <input type="submit" name="pass" value="Reset password" />
         <font size='05' face='Times New Roman' color='red'>
         <?php
          if(isset($msg)){
            echo '<p>'.$msg.'</p>';
          }
          ?>
         </font>
      </p>
       </font><div class="up">
        <input type="submit" name="Back" value="Back" />
</div>
</div>
</div>
</body>
</html>
