<?php
include 'core/db.php';
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location:index.php');
}

if(!isset($_SESSION['log']) || empty($_SESSION['log']))
{
  header('location:index.php');
}

$_SESSION['log']="";
$result=mysql_query("SELECT * FROM answer");
if(isset($_POST['Ok'])){
  header("Location:index.php");
}

?>
<html>
<head>
  <title>Score table</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  body{
    padding-left: 100px;
    padding-right: 100px;
  }
.ans{
  border: 5px solid black;
  padding-left: 15px;
}
.exp{
  padding-left: 40px;
}
  .fr input[type="submit"]{
  background: #333;
  color: #fff;
  padding: 5px 20px;

  border: 0;
  border-radius:5px;
  margin-top: 20px;
  margin-bottom: 20px;
  }
.fr{
  padding-left: 500px;
}
.fr input[type="submit"]:hover
{
  cursor: pointer;
  color: #000;
  font-weight: bolder;
}
  </style>

</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
<div class="header">
<div class="container">
<font color="Blue"><h1>Answer</h1></font>
</div>
</div>
<div class="ans">
<font size=5>
<?php

while($answer=mysql_fetch_assoc($result)){
echo $answer['question_no'];
echo ".";
echo $answer['question'];
echo "<br>";
echo "a).";
echo $answer['choice1'];
echo "<br>";
echo "b).";
echo $answer['choice2'];
echo "<br>";
echo "c).";
echo $answer['choice3'];
echo "<br>";
echo "d).";
echo $answer['choice4'];
echo "<br>";
?>correctanswer: <font color="Red">
  <?php echo $answer['correctanswer'];?>
</font>
<?php
echo "<br>";
?>
<font color="Blue">
  <?php echo "Explanation :";?>
  <div class="exp">
<?php
 echo $answer['exp'];
echo "<br>";?>
</font>
</div>
<?php
echo "<br>";
?>
<hr>
<?php  } ?>
</div>
 <div class="fr"><form  method="post" action="scoresheet.php">
 <input type="submit" name="lo" value="Logout" >
 </div>
 </form>

</font>
</body>
</html>
