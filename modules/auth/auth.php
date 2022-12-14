<?php
 if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>



<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Вход</title>
	<link rel="stylesheet" href="../../assets/css/header.css">
	<link rel="stylesheet" href="../../assets/css/footer.css">
	<link rel="stylesheet" href="../../assets/css/general.css">
	<link rel="stylesheet" href="../../assets/css/authreg.css">
</head>

<header>
	<?php 
		include ("../../blocks/header-guest.php");
	?>	

</header>

<body>
	<div class='body'style="height: 536px">
		<h2 style='margin-bottom: 70px; text-align: center;'>Вход в существующий аккаунт</h2>

		<div class='block'style="height: 536px">
			<form class = 'form' action="http://localhost/gamekm/modules/auth/auth_in.php" method="post">
				<input name="login" id='login' class='field' placeholder="Логин">
				<div name = 'errornlogin' id = 'errornlogin' class = 'message'><?=@$e1;?></div>
				<input name="password" class='field' placeholder="Пароль">
				<div id = 'errorpassword' class = 'message'><?=@$e2;?></div>
				<input type = 'submit' value = 'Войти' class = 'button'>
			</form>
			<h2 style='margin-bottom: 40px; text-align: center;'>Нет аккаунта?</h2>
			<a href="../../modules/registration/reg.php">Регистрация</a>
		</div>
	</div>
    
</body>

<footer>
	<?php 
		include ("../../blocks/footer.php");
	?>	
</footer>


</html>