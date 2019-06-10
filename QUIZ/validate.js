function validation() {
if(document.lg.question_text.value.trim()=="")
{
alert("Question is required");
document.lg.question_text.focus();
document.lg.question_text.style.backgroundcolor='red';
return false;
}
if(document.lg.choice1.value.trim()=="")
{
alert("choice1 is required");
document.lg.choice1.focus();
document.lg.choice1.style.backgroundcolor='yellow';
return false;
}
if(document.lg.choice2.value.trim()=="")
{
alert("choice2 is required");
document.lg.choice2.focus();
document.lg.choice2.style.backgroundcolor='yellow';
return false;
}
if(document.lg.choice3.value.trim()=="")
{
alert("choice3 is required");
document.lg.choice3.focus();
document.lg.choice3.style.backgroundcolor='yellow';
return false;
}
if(document.lg.choice4.value.trim()=="")
{
alert("choice4 is required");
document.lg.choice4.focus();
document.lg.choice4.style.backgroundcolor='yellow';
return false;
}
if(document.lg.correct_choice.value.trim()=="")
{
alert("Correctchoice is required");
document.lg.correct_choice.focus();
document.lg.correct_choice.style.backgroundcolor='yellow';
return false;
}
if(document.lg.correct_choice.value>=5)
{
alert("Invalid choice");
document.lg.correct_choice.focus();
document.lg.correct_choice.style.backgroundcolor='yellow';
return false;
}

}
