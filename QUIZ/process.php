<?php
include 'core/db.php';

$rollno=$_SESSION['RollNo'];

if(!isset($_SESSION['score'])){
  $_SESSION['score']=0;
}

if($_POST['submit']){
 $_SESSION['log']=TRUE;
 $number=$_POST['number'];
 $selected_question=$_POST['choice'];
 $next=$number+1;
$num=$number+1;
 $query_total=mysql_query("SELECT * FROM questions");
 $total=mysql_num_rows($query_total);

$query=mysql_query("SELECT * FROM choices WHERE question_number=$number AND is_correct=1");

$result=mysql_fetch_assoc($query);
$correct_question=$result['id'];
$ress=mysql_query("SELECT * FROM choices WHERE id='$selected_question'");
while($choices=mysql_fetch_assoc($ress)){
$rt= $choices['text'];
}
if($num == $next){
 if($selected_question == $correct_question){
   $_SESSION['score']=$_SESSION['score']+$_SESSION["Marks"];
 }
}
$ccansw=mysql_query("UPDATE answer SET yanswer='$rt' WHERE question_no=$number");
 if($number == $total){
   header('Location: final.php');
 }else{
   header('Location: question.php?n='.$next);
 }
 }
 else {
   $que="DELETE FROM student WHERE RollNo='$rollno'";
   $insert = mysql_query($que);
 }
