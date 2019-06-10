<?php

include 'core/db.php';

if(!isset($_SESSION['logged']) || empty($_SESSION['logged']))
{
  header('location:admin.php');
}
$queryes = "SELECT * FROM questions";
$questions = mysql_query($queryes);
$total = mysql_num_rows($questions);
if(isset($_POST['DeleteAll'])){
  $res="DELETE FROM questions ";
  $insert_row = mysql_query($res);
  $req="DELETE FROM choices ";
  $insert_row = mysql_query($req);
   $msg ='All questions are deleted';
$qs=mysql_query("DELETE FROM answer");
}
  if(isset($_POST['Delete'])){
    $question_number =$_POST['question_number'];
    if($question_number<=$total){

    $query="DELETE FROM questions WHERE question_number='$question_number'";
    $insert_row = mysql_query($query);
    $querys="DELETE FROM choices WHERE question_number='$question_number'";
    $insert_row = mysql_query($querys);
    $qs=mysql_query("DELETE FROM answer WHERE question_no='$question_number'");
    for($i=$question_number;$i<$total;$i++)
    {
      $k=$i+1;
    $queryes="UPDATE questions SET question_number='$i' WHERE question_number='$k'";
    $insert_row = mysql_query($queryes);
    $queryess="UPDATE choices SET question_number='$i' WHERE question_number='$k'";
    $insert_row = mysql_query($queryess);
    $queres="UPDATE answer SET question_no='$i' WHERE question_no='$k'";
    $ins=mysql_query($queres);
}
        $msg = 'Question has been delete successfully';
}
else {
  $msg='This question is not in database ';
}
}
if(isset($_POST['Back'])){
  header("Location:ad.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
 <title>Quizze</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <style>
 .container input[type="submit"]
 {
   border: none;
   outline: none;
   height: 32px;
   width: 100px;
   font-size: 16px;
 }

 </style>
</head>
<body oncontextmenu="return false;">
<script type="text/javascript" src="inspect.js">
</script>
   <div class="content">
   <div class="container">
    <u><font size='04'> <h3>Delete Question</h3></font></u>
     <font size='05' face='Times New Roman' color='red'>
     <?php
      if(isset($msg)){
        echo '<p>'.$msg.'</p>';
      }
      ?>
    </font>
     <form method="post" action="delete.php">
       <p>
         <label>Question Number</label>
         <input type="number" value="<?php echo $total; ?>" name="question_number" />
         <input type="submit" name="Delete" value="Delete" />
       </p>
       <p>
        <input type="submit" name="DeleteAll" value="Delete All" />
        <input type="submit" name="Back" value="Back" />
       </p>
</div>
</div>
</body>
</html>
