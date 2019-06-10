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

$_SESSION['login']= "";
if(isset($_POST['Login_btn'])){
    $Name= mysql_real_escape_string($_POST['Name']);
    $RollNo= mysql_real_escape_string($_POST['RollNo']);
    $dept=mysql_real_escape_string($_POST['dept']);
$_SESSION['dept']=$dept;
  $sql="SELECT * FROM student WHERE RollNo='$RollNo'";
  $result=mysql_query($sql);
if(mysql_num_rows($result) > 0)
{
  ?>
  <script>
  alert( "You already attend the quiz");
</script>
<?php
}else {
  mysql_query("INSERT INTO student(Name,RollNo,Department) VALUES('$Name','$RollNo','$dept')");
  $_SESSION['login'] = TRUE;
  $_SESSION['logi']= TRUE;
  $_SESSION['log']=TRUE;
  $_SESSION['message']="YOu are logged in";
  $_SESSION['Name']= $Name;
  $_SESSION['RollNo']= $RollNo;
  header("Location:welcome.php");

}

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
    if(document.lg.Name.value.trim()=="")
    {
    alert("Kindly enter the username");
    document.lg.Name.focus();
    document.lg.Name.style.backgroundcolor='yellow';
    return false;
    }
    var str = document.lg.RollNo.value;
    var valid = "0123456789";
    for (i = 0;i<str.length;i++) {
     if(valid.indexOf(str.charAt(i))==-1)
     {
       alert("Enter only number for RegNo");
       document.lg.RollNo.value="";
       document.lg.RollNo.focus();
       return false;
     }
    }
    if(document.lg.RollNo.value.trim()=="")
    {
    alert("Kindly enter the University Register Number");
    document.lg.RollNo.focus();
    document.lg.RollNo.style.backgroundcolor='yellow';
    return false;
    }
    if(document.lg.dept.value=="select"){
    alert("Kindly Select the Department");
    document.lg.dept.focus();
    document.lg.dept.style.backgroundcolor='yellow';
    return false;
    }
    }
    </script>

    <style>
    body{
      margin: 0;
      padding: 0;
      background-image: url(img13.jpg);
      background-size: 100%;
	  overflow-y:hidden;
      font-family:TimesNewRoman;
    }
    .loginbox{
        width: 320px;
        height: 460px;
        border: solid 5px;
        border-color: black;
        color: black;
        left: 50%;
        top: 50%;
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
        font-weight: 900;
    }

    .loginbox input{
        width: 100%;
        margin-bottom: 18px;
    }
::-webkit-input-placeholder{
  color: gray;
}
    .loginbox input[type="text"]
    {
      border: none;
      border-bottom: 2px solid #fff;
      background: transparent;
      outline: none;
      height: 40px;
      font-weight: bolder;
      color: black;
      font-size: 16px;
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
.loginbox select{
  border: none;
  outline: none;
  height: 30px;
  width: 80px;
  background: orange;
  color: white;
  margin-bottom: 20px;
  font-size: 18px;
  border-radius: 8px;
}
.loginbox select:hover
{
  cursor: pointer;
  background: #ffc107;
  color: #000;

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
    </style>
  </head>
  <body oncontextmenu="return false;">
  <script type="text/javascript" src="inspect.js">
  </script>
  <center>
<b> <u>  <font size=30 color="black" face="TimesNewRoman" <h1>Placement Aptitude Test</h1></font>
</u></b> </center>
  <div class="loginbox">
    <img src="tom.png" class="tom">
      <h1>Student<?php echo $_SESSION['login']; ?> Login </h1>
      <form name="lg" method="post" action="index.php" autocomplete="on" onSubmit="return validation();">
        <p>NAME</p>
        <input type="text" name="Name" placeholder="Enter Name">
        <p>UNIVERSITY REGISTER NO</p>
        <input type="text"  name="RollNo" placeholder="Enter Register number">
<b><label>DEPARTMENT :</label></b>
 <select name="dept">
<option >select </option>
<option value="CSE">CSE</option>
<option value="IT">IT</option>
<option value="EEE">EEE</option>
<option value="ECE">ECE</option>
<option value="MECH">MECH</option>
<option value="CIV">CIV</option>
  </select>
        <input type="submit" name="Login_btn" value="Login">
        <input type="reset" name="Reset" value="Clear">
        <a href="admin.php">Admin</a>
      </form>
  </div>
</body>
</html>
