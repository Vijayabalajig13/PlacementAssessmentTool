<?php
include 'core/db.php';
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location:index.php');
}
$_SESSION['log']="";
$_SESSION['lo']="";
if(isset($_SESSION['score'])){
  $tim=(($_SESSION["duration"]*60)-$_SESSION['time'])/60;
  $time= number_format($tim,2);
  $_SESSION['stime']=$time;
  $Scores=$_SESSION['score'];
  $RollNo=$_SESSION['RollNo'];
  $query="UPDATE student SET Score='$Scores',Time='$time' WHERE RollNo='$RollNo'";
  $insert_row = mysql_query($query);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Final</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.fi{
  margin-top: 100px;
}
#timer{
  color:red;
  font-size:20px;
  text-align:center;
}

</style>

</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
	<div class="header">
	<div class="container">
	<h2>Thank You</h2>
	</div>
	</div>
	<div class="content">
	<div class="container">
    <div class="fi">
	<h2>Congrats!!!</h2></br></br><h2> you have completed the Quiz Successfully</h2>
 <br><br> <div><h2>Loading scoresheet <br> <font color="red">Wait for <span id="timer"></span> seconds</h2></font></div>
  <script>

  document.getElementById('timer').innerHTML =
      10;
startTimer();
  function startTimer() {
    var presentTime = document.getElementById('timer').innerHTML;
    var pres=presentTime-1;
    if(pres<=0){
      <?php
    $_SESSION['logi']=TRUE; ?>
    window.location.href = "scoresheet.php";
  }
    document.getElementById('timer').innerHTML =
      pres;
    setTimeout(startTimer, 1000);

  }
  </script>
</br>
  </div>
</div>
	</div>

</body>
</html>
