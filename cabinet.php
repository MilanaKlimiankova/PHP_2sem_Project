<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$id = $_GET['user_id'];

include 'connect/db.php'; /*подключаемся к БД*/
$query="SELECT * FROM users WHERE id='$id'";
$rez = mysqli_query($link, $query) or die("Ошибка " .
mysqli_error($link));
$row = mysqli_fetch_assoc($rez);
$subscribers = explode(',', $row['subscribers']);
$subscriptions = explode(',', $row['subscriptions']);

$query1="SELECT COUNT(*) FROM likes WHERE userid='$id'";
$rez1 = mysqli_query($link, $query1) or die("Ошибка " .
mysqli_error($link));
//$row1 = mysqli_fetch_assoc($rez1);
$count = mysqli_fetch_row($rez1)[0];

$query2="SELECT COUNT(*) FROM comments WHERE userid='$id'";
$rez2 = mysqli_query($link, $query2) or die("Ошибка " .
mysqli_error($link));
$count2 = mysqli_fetch_row($rez2)[0];

mysqli_close($link);

?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Кабинет пользователя</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" defer></script>

<link rel="stylesheet" href="http://localhost/gamekm/assets/css/header.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/footer.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/cabinet.css">

<script src="functions/sections-cabinet-logged.js"></script>
<script src="functions/subscribe.js" defer></script>
<script src="functions/modal.js" defer></script>

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
	<div class = 'block' style="margin-bottom: 70px; height: 505px;">
		<div class='bg'>
			<!-- <object
			  type="image/svg+xml"
			  data="assets/images/settings icon.svg" >
			</object> -->
		</div>

		<div class= 'avatar-name'>
			<div class='avatar'></div>
			<h1 class = 'username'><?=@$row['login'];?></h1>
			<?php 

			if(isset($_SESSION['login'])){
				if ($_SESSION['id'] != $_GET['user_id'])
				echo '<div class=\'button\' id=\'subscribe\' data-id=\''.$id.'\'>Подписаться</div>';
			} else echo '<div class=\'button\' id=\'subscribe\' data-id=\''.$id.'\'>Подписаться</div>';
			?>
			
		</div>

		<div class='statistics'>
			<div>
				<div class='name'>Лайки</div>
				<h1 class='number'style="color: var(--green);"><?=@$count;?></h1>
			</div>
			<div>
				<div class='name'>Комменты</div>
				<h1 class='number'style="color: var(--lightgreen);"><?=@$count2;?></h1>
			</div>
			<div>
				<div class='name myBtn' >Подписки</div>
				<h1 class='number'style="color: var(--blue);"><?=@count($subscriptions)-1;?></h1>
			</div>
			<div>
				<div class='name myBtn' >Подписчики</div>
				<h1 id ='subscribersCounter' class='number'style="color: var(--orange);"><?=@count($subscribers)-1;?></h1>
			</div>
		</div>
	</div>

	<div class='block'style="height: 800px;">
		<div class="categories">
			<h2 id='posts' style="color: var(--blue);" onclick="showSection(event, <?=@$id;?>,'http://localhost/gamekm/blocks/userPosts.php?userid=', '#8EF1FF')">Посты</h2>
			<h2 id='comments' onclick="showSection(event, <?=@$id;?>,'http://localhost/gamekm/blocks/userComments.php?userid=', '#FF96BC')">Комментарии</h2>
			<h2 id='likes' onclick="showSection(event, <?=@$id;?>,'http://localhost/gamekm/blocks/userLikes.php?userid=', '#F4BF00')">Избранное</h2>
		</div>

		<div class = 'line' id='line'></div>

		<div class = 'content'>
			<?php 
			echo "<iframe id='iframe' name=\"content\" width=\"100%\" height=\"100%\" src=\"http://localhost/gamekm/blocks/userPosts.php?userid=".$id."\"></iframe>"
			?>	
		</div>
	</div>
	
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-body">
      <?php 
		echo "<iframe id='iframe' name=\"content\" width=\"100%\" height=\"100%\" src=\"http://localhost/gamekm/blocks/loadSubscriptions.php?userid=".$id."\" style=\"height: 400px;\"></iframe>"
				?>	
    </div>
  </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-body" id ='subscribersList'>
      <?php 
		echo "<iframe id='iframe' name=\"content\" width=\"100%\" height=\"100%\" src=\"http://localhost/gamekm/blocks/loadSubscribers.php?userid=".$id."\" style=\"height: 400px;\"></iframe>"
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