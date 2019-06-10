<?php
include_once 'core/db.php';
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
  header('location:index.php');
}
if(!isset($_SESSION['lo']) || empty($_SESSION['lo']))
{
  header('location:index.php');
}
$_SESSION['log']="";


if(isset($_POST['Logout'])){
$_SESSION['time']=0;
  header("Location:final.php");
}

?>
<html>
<head>
<style>
body{
  margin: 0;
  padding: 0;
  background-image: url(img1.jpg);
  background-size: 100%;
overflow-y:hidden;
  font-family:TimesNewRoman;
}

.ad{
  padding-top: 100px;
}
.ad input[type="submit"]{
background: transparent;
padding: 15px 45px;
color: white;
font-size: 22px;
font-weight: bolder;
border: 2px solid black;
border-radius:5px;
margin-top: 100px;
}
  .ad input[type="submit"]:hover{
    cursor: pointer;
    background: white;
    color: black;
  }
</style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
  <center>
    <div class="ad">
<font color="red">  <h1>TIMEOUT</h1></font>
         <form method="post" action="timeout.php">
<input type="submit" name="Logout" value="OK" />
</form>
</div>
</center>
</body>
</html>
