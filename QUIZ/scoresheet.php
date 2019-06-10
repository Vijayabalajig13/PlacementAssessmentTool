<?php
include 'core/db.php';
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
$_SESSION['login']="";
$query_total=mysql_query("SELECT * FROM questions");
$total=mysql_num_rows($query_total);

if(isset($_POST['Ok'])){
  $_SESSION['log']=TRUE;
  $_SESSION['login']=TRUE;
  header("Location:answer.php");
}

?>
<html>
<head>
  <title>Score table</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  .score{
    padding-left:400px;
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
  .content ul li{
  padding:  15px;
  padding-left: 3px;
  padding-top: 0px;
  padding-bottom:5px;
}

.fr input[type="submit"]:hover
{
  cursor: pointer;
  color: #000;
}
  </style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
<div class="header">
<div class="container">
<font color="red"><h1>ScoreSheet</h1></font>
</div>
</div>
<div class="content">
<div class="container">
  <font size ='05'>
<ul>
 <li><strong>Name:</strong><font color="blue"><?php echo $_SESSION['Name'];?></font> </li>
<li><strong>Register No:</strong><font color="blue"><?php echo $_SESSION['RollNo'];?></font> </li>
<li><strong>Department:</strong><font color="blue"><?php echo $_SESSION['dept'];?></font> </li><br>
 <li><strong>Your Score :</strong><font color="blue"> <?php echo $_SESSION['score']; ?>/<?php echo $total; ?></font></li>
 <li><strong> You finished the quiz in</strong><font color="blue"> <?php echo $_SESSION['stime']; ?> mins</font></li>
</ul>
</font>
<div class="fr"><form  method="post" action="scoresheet.php">
<input type="submit" name="Ok" value="View Answers" />
</div>
</form>
</div>
</div>
<hr>
</body>
</html>
