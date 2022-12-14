<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Кроха Мотылёк</title>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/footer.css">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/about.css">

	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="functions/reveal.js" defer></script>

</head>

<header>
		<?php 
	if(isset($_SESSION['login'])){
		include ("http://localhost/gamekm/blocks/header-logged.php?user_id=".$_SESSION['id']);
		} else include ("http://localhost/gamekm/blocks/header-guest.php");
	?>	

</header>

<body>
	<div class='intro'>
		<object
		 type="image/svg+xml"
		 data="assets/images/intro.svg"
		 style="background: transparent;">
		</object>
	</div>

	<div class='story'>
		<ul type='none'>
			<li style = 'font-size: 24px;' class="reveal">Этот тайный лес наполнен разными духами.</li>
			<li class="reveal">Все они жили в мире и гармонии.</li>
			<li class="reveal">Но только до недавнего времени...</li>
			<li style = 'font-size: 24px;' class="reveal">Кажется, один из них чем-то недоволен.</li>
			<li class="reveal">Своей тёмной силой он губит лес.</li>
			<li class="reveal">Нужно успокоить его, пока лес не уничтожен окончательно... </li>
			<li style = 'font-size: 24px;' class="reveal">Помоги спасти лес от обозлённого духа!</li>
		</ul>
		
		<a href="/images/myw3schoolsimage.jpg" download class="reveal">Скачать</a>
	</div>
    
</body>

<footer>
	<?php 
		include ("blocks/footer.php");
	?>	
</footer>


</html>