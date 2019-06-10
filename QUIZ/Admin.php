<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

session_start();
$host="localhost";
$user="root";
$password="";
$db="quizz";

mysql_connect($host,$user,$password);
mysql_select_db($db);

$_SESSION['logged']= "";
if(isset($_POST['username'])){
  $uname=$_POST['username'];
  $pwd=$_POST['password'];
  $sql="select * from admin where Admin='".$uname."'AND Pwd='".$pwd."'";
  $result=mysql_query($sql);
  if(mysql_num_rows($result)==1){

    $_SESSION['logged']= TRUE;
    header("Location:ad.php");
    exit();
  }
  else {
    ?>
 <script>alert("enter the Correct password");
</script> <?php }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <title> Login form </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type ="text/javascript">
    function validation()
    {
    if(document.lg.username.value.trim()=="")
    {
    alert("Kindly enter the username");
    document.lg.username.focus();
    document.lg.username.style.backgroundcolor='yellow';
    return false;
    }
    else if(document.lg.password.value.trim()=="")
    {
    alert("Kindly enter the Password");
    document.lg.password.focus();
    document.lg.password.style.backgroundcolor='yellow';
    return false;
    }
    }
    </script>
<style>
    body{
      margin: 0;
      padding: 0;
      background-image: url(img14.jpg);
      background-size: 100%;
      overflow-y:hidden;
      font-family:TimesNewRoman;
    }

    .loginbox{
        width: 320px;
        height: 420px;
        border: solid 5px;
        border-color: black;
        color: black;
        top: 50%;
        left: 50%;
        font-size: 21px;
         position: absolute;
        transform: translate(-50%,-50%);
        box-sizing: border-box;
        padding: 70px 30px;
    }
    .tom{
      width: 100px;
      height: 100px;
      border-radius: 50%;
      position: absolute;
      top: -50px;
      left: calc(50% - 50px);
    }
    h1{
      margin: 0;
      padding: 0 0 20px;
      text-align: center;
      font-size: 22px;
    }

    .loginbox p{
        margin: 0;
        padding: 0;
        font-weight:900;
    }

    .loginbox input{
        width: 100%;
        margin-bottom: 18px;
    }

    .loginbox input[type="text"],input[type="password"]
    {
      border: none;
      border-bottom: 2px solid #fff;
      background: transparent;
      outline: none;
      height: 40px;
      color: #fff;
      font-weight: bolder;
      font-size: 20px;
      font-family: timesnewroman;
    }
    ::-webkit-input-placeholder{
      color: gray;
    }

    .loginbox input[type="submit"],input[type="reset"]
    {
      border: none;
      outline: none;
      height: 30px;
      background: #fb2525;
      color: #fff;
      font-size: 18px;
      border-radius: 20px;
    }

    .loginbox input[type="submit"]:hover
    {
      cursor: pointer;
      background: #ffc107;
      color: #000;
    }
    .loginbox input[type="reset"]:hover
    {
      cursor: pointer;
      background: #ffc107;
      color: #000;
    }
    .loginbox a{
      text-decoration: none;
      font-size: 22px;
      font-weight: bolder;
       line-height: 15px;
      color: #ffc107;
    }

    .loginbox a:hover
    {
          color: blue;
    }
    @media only screen and (max-width: 960px){
       .coo{
         width:80%;
          }
}
    </style>
    </head>
    <body oncontextmenu="return false;">
    <script type="text/javascript" src="inspect.js">
    </script>
  <div class="coo">
  <div class="loginbox">
    <img src="tom.png" class="tom">
      <h1>Admin Login</h1>
      <form name="lg" method="post" action="admin.php" onsubmit="return validation();">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="logged" value="Login">
        <input type="reset" name="Reset" value="Clear">
      <a href="index.php">Student Login</a>
      </form>
  </div>
</div>
</body>
</html>
