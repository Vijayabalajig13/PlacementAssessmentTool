<?php

include_once 'core/db.php';

if(!isset($_SESSION['logged']) || empty($_SESSION['logged']))
{
  header('location:admin.php');
}
if(isset($_POST['Add'])){
  header("Location:add.php");
}
if(isset($_POST['Reset'])){
  header("Location:update.php");
}
if(isset($_POST['Delete'])){
  header("Location:Delete.php");
}
if(isset($_POST['Score'])){
  header("Location:Score.php");
}
if(isset($_POST['Logout'])){

  header("Location:admin.php");
}

 ?>
<!DOCTYPE html>
<html>
<head>
 <title>Quizze</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body{
  margin: 0;
  padding: 0;
  background-image: url(img6.jpg);
  background-size: 100%;
  overflow-y:hidden;
  font-family:TimesNewRoman;
}
.ad{
  padding-left: 250px;
}
 .ad input[type="submit"]{
 background: transparent;
 border: 2px solid black;
 color: gray;
 font-weight: bolder;
 padding: 12px 45px;
 border-radius:5px;
 margin-top: 200px;
 }
 .ad input[type="submit"]:hover{
   cursor: pointer;
   background:white;
   color: black;
 }
</style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
  <div class="ad">
         <form method="post" action="ad.php">
<input type="submit" name="Add" value="Add Question" />
<input type="submit" name="Delete" value="Delete Question" />
<input type="submit" name="Reset" value="ResetQuiz" />
<input type="submit" name="Score" value="Score" />
<input type="submit" name="Logout" value="Logout" />
</form>
</div>
</body>
</html>
