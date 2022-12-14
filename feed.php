<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(isset($_SESSION['login'])){
	$id = $_SESSION['id'];
	} else $id = '';

?>

<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Главная</title>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/footer.css">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/cabinet.css">
	<script src="functions/sections-cabinet-logged.js"></script>
</head>

<header>
		<?php 
	if(isset($_SESSION['login'])){
		include ("http://localhost/gamekm/blocks/header-logged.php?user_id=".$_SESSION['id']);
		} else include ("http://localhost/gamekm/blocks/header-guest.php");
	?>	

</header>

<body>
	<div class = "body">
		<div class='block'style="height: 800px;">
			<div class="categories">
				<?php 
					if(isset($_SESSION['login'])){
						echo "<h2 id='posts' style=\"color: var(--blue);\" onclick=\"showSection(event,".$id.",'http://localhost/gamekm/blocks/feedSubscribed.php?userid=', '#8EF1FF')\">Подписки</h2>";
					} else echo "<h2 id='posts' style=\"color: var(--blue);\" onclick=\"showSection(event,'' ,'http://localhost/gamekm/blocks/feedSubscribedGuest.php', '#8EF1FF')\">Подписки</h2>";
				?>

				<h2 id='comments' onclick="showSection(event, '','http://localhost/gamekm/blocks/feedPopular.php', '#FF96BC')">Актуальное</h2>
				<h2 id='likes' onclick="showSection(event, '','http://localhost/gamekm/blocks/feedGuides.php', '#F4BF00')">Гайды</h2>
			</div>

			<div class = 'line' id='line'></div>

			<div class = 'content'>
				<?php 
					if(isset($_SESSION['login'])){
						echo "<iframe id='iframe' name=\"content\" width=\"100%\"  src=\"http://localhost/gamekm/blocks/feedSubscribed.php?userid=".$id."\"></iframe>";
						} else echo "<iframe id='iframe' name=\"content\" width=\"100%\"  src=\"http://localhost/gamekm/blocks/feedSubscribedGuest.php\"></iframe>";
				?>	
				
			</div>
		</div>
		
	</div>
</body>

<footer>
	<?php 
		include ("blocks/footer.php");
	?>	
</footer>


</html>