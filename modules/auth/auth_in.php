<?php
 if(session_status()!=PHP_SESSION_ACTIVE) session_start();


 if (isset($_POST['login'])) { $login = $_POST['login']; if ($login
== '') { unset($login);} }
 if (isset($_POST['password'])) { $password=$_POST['password']; if
($password =='') { unset($password);} }

 if (empty($login) || empty($password)) {

echo "<script language='Javascript' type='text/javascript'>
 alert ('Вы заполнили не все поля!');
 </script>";
 exit();
 }

 
 $login = stripslashes($login);
 $login = htmlspecialchars($login);
 $password = stripslashes($password);
 $password = htmlspecialchars($password);
 $login = trim($login);
 $password = trim($password);
 $_SESSION['temp_login']=$login;

 include '../../connect/db.php';
 $query ="SELECT * FROM users WHERE login='$login'";
 $result = mysqli_query($link, $query) or die("Ошибка " .
mysqli_error($link));
 $row = mysqli_fetch_assoc($result);
 if (empty($row['id']))
 {
	 mysqli_close($link);
	 print "<script language='Javascript' type='text/javascript'>
	 alert ('Такого логина не существует!');
	 function reload(){location = 'auth.php'};
	 setTimeout('reload()', 0)
	 </script>";
 }
 else {
 if ($row['password']==md5(md5($password).$row['salt']))
 {
 $_SESSION['login']=$row['login'];
 $_SESSION['email']=$row['email'];
 $_SESSION['subscribers']=$row['subscribers'];
  $_SESSION['subscriptions']=$row['subscriptions'];
 $_SESSION['id']=$row['id'];



 echo "<script language='Javascript'
type='text/javascript'>
 function reload(){
 	top.location = '../../cabinet.php?user_id=".$_SESSION['id']."'};
 setTimeout('reload()', 0)
 </script>";
 }
 else {
	$e3.="Вы ввели не правильный пароль<br>";
 
 }
 mysqli_close($link);
 }

?>