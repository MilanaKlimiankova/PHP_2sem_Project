<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Главная</title>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/footer.css">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/post.css">
	<link rel="stylesheet" href="assets/css/index.css">

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
	
    <div class = 'body'>
    	<div class = 'block' style='margin-bottom: 70px; padding: 0;'>
    		<div class='bg'>
    			<div class = 'banner-icon'></div>
				<a class = 'button'>Скачать</a>
			</div>
    	</div>
    
    <h2 style ='margin-bottom: 40px;'>Актуальные публикации:</h2>
    	<?php 
	if(session_status()!=PHP_SESSION_ACTIVE) session_start();

	include 'connect/db.php'; /*подключаемся к БД*/
	$query="SELECT * FROM posts ORDER BY data DESC LIMIT 10";
	$rez = mysqli_query($link, $query) or die("Ошибка " .
	mysqli_error($link));

	while($row = mysqli_fetch_assoc($rez)) { 

    echo"<div class='block comment-block reveal' style='margin-bottom: 40px;'>
			<div class='comment-area'>
				<a href=\"http://localhost/gamekm/post.php?post_id=".$row['postid']."\" target=\"_blank\">".$row['theme']."</a>
				<div class='comment'>".mb_substr($row['content'],0, 250,'UTF-8')."..."."</div>
				<div style='display:flex;'>
				<span class='data'>".$row['data']."</span>
				<object
						  type=\"image/svg+xml\"
						  data=\"http://localhost/gamekm/assets/images/comment icon.svg\" class='commentIcon'>
						</object>
						<div class='counter-comments'>".$row['commentscount']."</div>
						<object
						  type=\"image/svg+xml\"
						  data=\"http://localhost/gamekm/assets/images/like icon.svg\"
						  style=\"margin-left: 10px;\">
						</object>
						<div class='counter-likes' >".$row['likescount']."</div>
				</div>		
			</div>
		</div>";
	};

?>
	</div>
</body>

<footer>
	<?php 
		include ("blocks/footer.php");
	?>	
</footer>


</html>