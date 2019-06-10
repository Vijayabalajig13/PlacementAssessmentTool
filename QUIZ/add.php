<?php
include 'core/db.php';
if(!isset($_SESSION['logged']) || empty($_SESSION['logged']))
{
  header('location:admin.php');
}
  if(isset($_POST['submit'])){


    $question_number =$_POST['question_number'];
    $question_text =nl2br($_POST['question_text']);
    $explain =nl2br($_POST['exp']);
    $correct_choice =$_POST['correct_choice'];

    $choices = array();
    $choices[1] =$_POST['choice1'];
    $choices[2] =$_POST['choice2'];
    $choices[3] =$_POST['choice3'];
    $choices[4] =$_POST['choice4'];

   $query="INSERT INTO questions (question_number,text)
                  VALUES ('$question_number','$question_text')";
    $insert_row = mysql_query($query);
    $qs="INSERT INTO answer (question_no,question)
                  VALUES ('$question_number','$question_text')";
$ins_row = mysql_query($qs);
$qsach="UPDATE answer SET choice1='$choices[1]',choice2='$choices[2]',choice3='$choices[3]',choice4='$choices[4]' WHERE question_no=$question_number";
$in_ch=mysql_query($qsach);

    if($insert_row){
      foreach ($choices as $choice => $value) {
        if($value != ''){
          if($correct_choice == $choice){
            $ch=$value;
            $is_correct = 1;
          } else{
            $is_correct = 0;
          }
          $querys = "INSERT INTO choices (question_number,is_correct,text)
                              VALUES ('$question_number','$is_correct','$value')";
          $insert_row = mysql_query($querys);
$exp=mysql_query("UPDATE answer SET exp='$explain' WHERE question_no=$question_number");
$ccansw=mysql_query("UPDATE answer SET correctanswer='$ch' WHERE question_no=$question_number");
          if($insert_row){
            continue;
          }else {
           die('Error : ('.mysql_errno() . ') '. mysql_error());
          }
        }
      }
      $msg = 'Question has been added';
    }
  }

$queryes = "SELECT * FROM questions";
$questions = mysql_query($queryes);
$total = mysql_num_rows($questions);
$next=$total+1;
 ?>
<!DOCTYPE html>
<html>
<head>
 <title>Quizze</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.contain{
width: 600px;
margin: auto;
}
.cont{
width: 250px;
margin: auto;
padding: 30px 15px;
min-height: 420px;
}
.cont h3{
margin:0 0;
padding-left: 5px;
padding-bottom: 10px;
text-transform: capitalize;
}
.cont p{
margin: 15px 0;
text-transform: capitalize;
}
label{
  display: inline-block;
  width:180px;
}
input[type='text']{
  width:97%;
  padding: 4px;
  border-radius: 5px;
  border: 1px #ccc  solid;
}
input[type='number']{
  width:50px;
  padding: 4px;
  border-radius: 5px;
  border: 1px #ccc  solid;
}
.cont input[type="submit"]{
background: #333;
color: #fff;
padding: 5px 15px;
border: 0;
border-radius:5px;
margin-top: 20px;
}
.cont input[type="submit"]:hover{
  cursor: pointer;
  font-weight: bolder;
  color: #000;
}
a{
  text-decoration: none;
  border: 2px solid black;
  border-color: #333;
  padding: 2px 12px;
  color: white;
  border-radius: 6px;
  background: #333;
}
 a:hover
{
      font-weight: bolder;
      color: #000;
}

</style>
</head>
  <body oncontextmenu="return false;">
  <script type="text/javascript" src="inspect.js">
  </script>
  <script type="text/javascript" src="validate.js">
</script>
   <div class="cont">
   <div class="contain">
     <u><font size='04'> <h3>Add Question</h3></font></u>
     <font size='05' face='Times New Roman' color='red'>
     <?php
      if(isset($msg)){
        echo '<p>'.$msg.'</p>';
      }
      ?>
    </font>
     <form name="lg" method="post"  action="add.php" onSubmit="return validation();">
       <p>
         <label>Question Number</label>
         <input type="number" value="<?php echo $next; ?>" name="question_number" />
       </p>
       <label>Question Text</label>
       <p>
         <textarea  cols="80" rows="11" value="<?php echo $question_text; ?>" name="question_text"></textarea>
       </p>
       <p>
         <label>Choice 1:</label>
         <input type="text" name="choice1" />
       </p>
       <p>
         <label>Choice 2:</label>
         <input type="text" name="choice2" />
       </p>
       <p>
         <label>Choice 3:</label>
         <input type="text" name="choice3" />
       </p>
       <p>
         <label>Choice 4:</label>
         <input type="text" name="choice4" />
       </p>
       <p>
         <label>Correct Choice Number:</label>
         <input type="number" name="correct_choice" />
 </p> <label>Explanation</label>
<textarea  cols="80" rows="11" value="<?php echo $explain; ?>" name="exp"  >NO EXPLANATION</textarea>

       <p>
         <input type="submit" name="submit" value="Submit" />

<a href="ad.php">back</a>
       </p>
   </form>
   </div>
   </div>
   </body>
   </html>
