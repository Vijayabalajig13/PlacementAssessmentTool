<?php

include 'core/db.php';

/*
*Get Question
*/
$rollno=$_SESSION['RollNo'];
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  $que="DELETE FROM student WHERE RollNo='$rollno'";
  $insert = mysql_query($que);
  header('location:index.php');
}
if(!isset($_SESSION['log']) || empty($_SESSION['log']))
{
 header('location:index.php');
}
$_SESSION['logi']="";
$_SESSION['log']="";
$_SESSION['lo']=TRUE;
$number=$_GET['n'];
$next=$number+1;
$query=mysql_query("SELECT * FROM questions WHERE question_number=$number");
$result=mysql_fetch_assoc($query);

$query_choice=mysql_query("SELECT * FROM choices WHERE question_number=$number");

$query_total=mysql_query("SELECT * FROM questions");
$total=mysql_num_rows($query_total);


if($number>$total){
  header('Location: error.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Quizze</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">

<style>
#response{
  width: 30%;
  padding-left: 1250px;
  position:fixed;
  font-weight: bolder;
  color:red;
  margin: 0 auto;
  font-size: 35px;
}
h2.ques{
  padding-right: 250px;
  padding-top: 10px;
}
.cot{
  min-height: 416px;
  text-align:left;
  padding-left: 30px;

}
.cot input[type='radio']{
  padding: 4px;
  border-radius: 5px;
  border: 1px #ccc  solid;
}
.cot input[type='radio']{
  cursor: pointer;
}
.cot input[type="submit"]:hover
 {
   cursor: pointer;
   color: #000;
   font-weight: bolder;
 }
.cot ul{
list-style: none;
}
.cot ul li{
padding:  15px;
padding-left: 3px;
padding-top: 20px;
padding-bottom:10px;
}
.cot input[type="submit"]{
background: #333;
color: #fff;
padding: 5px 15px;
border: 0;
border-radius:5px;
margin-top: 20px;
}
</style>

</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
<div class="head">
<div class="container">
<h1>Placement Aptitude Test</h1>
</div>
</div>
 <script type="text/javascript">
 setInterval(function()
{
  var xmlhttp=new XMLHttpRequest();

  xmlhttp.open("GET","response.php",false);
  xmlhttp.send(null);
  document.getElementById("response").innerHTML=xmlhttp.responseText;
  startTimer();
},0);

function startTimer() {
  var presentTime = document.getElementById("response").innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
  <?php
  if($number >$total){
    header('Location: timeout.php');
  }
?>
  window.location.href = "timeout.php";
}

  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;

}
</script>
<div id="response"></div>
<div class="cot">
  <h2 class="ques"><?php echo $number; ?>.<?php echo $result['text'] ; ?></h2>

<form action="process.php" method="post">
<ul>
  <?php
    while($choice= mysql_fetch_assoc($query_choice)){
      ?>
      <li><h3><input type="radio" name="choice" value="<?php echo $choice['id']; ?>">
         <?php echo $choice['text']; ?></h3> </li>

      <?php
    }
   ?>
</ul>
<input type="hidden" name="number" value="<?php echo $number;?>">
<div class="it">
<input type="submit" name="submit" value="submit" >
</div>
</form>
</div>

</body>
</html>
