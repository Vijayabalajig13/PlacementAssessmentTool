<?php

include_once 'core/db.php';

if(!isset($_SESSION['logged']) || empty($_SESSION['logged']))
{
  header('location:admin.php');
}

$sql="SELECT * FROM student order by Score desc,Time limit 10";
$records=mysql_query($sql);
if(isset($_POST['Delete'])){
mysql_query("DELETE FROM student");
}
if(isset($_POST['display'])){
$records=mysql_query("SELECT * FROM student order by Score desc,Time");
}
if(isset($_POST['export'])){
  header("Location:export.php");
}

if(isset($_POST['Back'])){
  header("Location:ad.php");
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Score table</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  .score{
    padding-left:400px;
  }
  .back input[type="submit"]{
  background: #333;
  color: #fff;
  padding: 5px 40px;
  border: 0;
  border-radius:5px;
  margin-top: 20px;
  margin-bottom: 20px;
  }
  .back select{
    background: #333;
    color: #fff;
    padding: 5px 10px;
    border: 0;
    border-radius:5px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  </style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
<div class="header">
<div class="container">
<font color="red"><h1>Score table</h1></font>
</div>
</div>
<div class="score">
<table width="600" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <th>SNo</th>
<th>Name</th>
<th>RegiterNo</th>
<th>Department</th>
<th>Score</th>
<th>Time(in MIN)</th>
  <tr>

  <?php
   $_SESSION['Sno']=0;
while($student=mysql_fetch_assoc($records)){
$_SESSION['Sno']=$_SESSION['Sno']+1;
  echo "<tr>";
  echo "<td>".$_SESSION['Sno']."</td>";
  echo "<td>".$student['Name']."</td>";
  echo "<td>".$student['RollNo']."</td>";
  echo "<td>".$student['Department']."</td>";
  echo "<td>".$student['Score']."</td>";
  echo "<td>".$student['Time']."</td>";
  echo "</tr>";
}
   ?>
 </div>
<div class="back">
     <form  method="post" action="Score.php">
<input type="submit" name="Back" value="Back" />
<input type="submit" name="display" value="Display All" />
<input type="submit" name="Delete" value="Delete scoresheet" />
<input type="submit" name="export" value="export" />
</form>
</div>
</body>
</html>
