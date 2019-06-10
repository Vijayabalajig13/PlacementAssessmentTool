<?php

session_start();

error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$connect=mysql_connect('localhost','root','') or die('Problem with Connection');
$dbname=mysql_select_db('quizz') or die('Problem with Database');
