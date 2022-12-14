<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


if (isset($_POST['content'])) { $content = $_POST['content']; if ($content ==
'') { unset($content);} }


if(isset($_POST["go"])):

	 $e1=null;
	 $content=trim($_POST["content"]);
	 $content=strip_tags($content);
	 $content=stripslashes($content);
	 if(strlen($content)=="0"):
	 	$e1.="Это обязательное поле<br>";
	 endif;
	
		
	 $userid = $_SESSION['id'];
		 $login = $_SESSION['login'];
		 $postid = $_GET['post_id'];

	 $eEn=$e1;
	 if($eEn==""):
		 $tm = date("Y-m-d",time());
		 include 'connect/db.php'; /*подключаемся к БД*/
		 $query="INSERT INTO comments (postid, userid, content, data) VALUES
		('$postid','$userid','$content', '$tm')";
		$result=mysqli_query($link, $query) or die("Ошибка " .
		mysqli_error($link));

            // делаем запись для контента - увеличиваем количесво голосов(лак или дизлайк)
            $query="UPDATE posts SET commentscount =commentscount + 1 WHERE  postid = $postid ";
            mysqli_query($link, $query) or die(mysql_error());

		if ($result) /*пишем данные в БД*/
		{
				echo "<script language='Javascript' type='text/javascript'> alert('Комментарий опубликован!')</script>";
				 echo "<script language='Javascript'
					type='text/javascript'>
					 function reload(){
					 	top.location = \"http://localhost/gamekm/post.php?post_id=".$postid."\"};
					 setTimeout('reload()', 0)
					 </script>";
			}
endif;
endif;

?>

<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
 <title>Публикация</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 

<link rel="stylesheet" href="http://localhost/gamekm/assets/css/header.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/footer.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
<link rel="stylesheet" href="http://localhost/gamekm/assets/css/post.css">

<script src="https://unpkg.com/scrollreveal"></script>
<script src="http://localhost/gamekm/functions/reveal.js" defer></script>
</head>

<header>
	<?php 
if(isset($_SESSION['login'])){
	include ("http://localhost/gamekm/blocks/header-logged.php?user_id=".$_SESSION['id']);
	} else include ("http://localhost/gamekm/blocks/header-guest.php");
?>	

</header>

<body>
<div class='body'>
	<div class='block'>
		<?php 
		if(session_status()!=PHP_SESSION_ACTIVE) session_start();

		$postid = $_GET['post_id'];
		
		include 'connect/db.php'; /*подключаемся к БД*/
		$query="SELECT * FROM posts WHERE postid='$postid'";
		$rez = mysqli_query($link, $query) or die("Ошибка " .
		mysqli_error($link));
		$row = mysqli_fetch_assoc($rez);
		mysqli_close($link);
		?>

		<h2><?=@$row['theme'];?></h2>
		<div class='feedback1'>
			<span class='data'><?=@$row['data'];?></span>
					<object
					  type="image/svg+xml"
					  data="http://localhost/gamekm/assets/images/comment icon.svg" class='commentIcon'>
					</object>
					<div class='counter-comments'><?=@$row['commentscount'];?></div>
					<object
					  type="image/svg+xml"
					  data="http://localhost/gamekm/assets/images/like icon.svg"
					  style="margin-left: 10px;">
					</object>
					<div class='counter-likes' id='span_like'><?=@$row['likescount'];?></div>
				</div>
				<div class='text'><?=@$row['content'];?></div>
		<div class='feedback2'>
			<span class='data'>Автор: </span>
			<?php
			$id = $row['userid'];
			include 'connect/db.php'; /*подключаемся к БД*/
			$query="SELECT * FROM users WHERE id='$id'";
			$rez = mysqli_query($link, $query) or die("Ошибка " .
			mysqli_error($link));
			$author = mysqli_fetch_assoc($rez);
			mysqli_close($link);

			echo "<a href=\"http://localhost/gamekm/cabinet.php?user_id=".$author['id']."\" class='author'>".$author['login']."</a>";
			?>
			<div class="likeButton" data-postid='<?=@$postid;?>'>
				<object
					  type="image/svg+xml"
					  data="http://localhost/gamekm/assets/images/like icon white.svg"
					  style="margin-right: 10px;">
					</object>
				<span class='like' id='label'>В избранное</span>

			</div> 
		</div>
	</div>
	<h2 style="margin-top: 40px; margin-bottom: 40px;">Оставить комментарий:</h2>
	<div class='block comment-block'>
		<div class='avatar'></div>
		<div class='comment-area'>
			<h2><?=@$_SESSION['login']?></h2>
			<form method="post" action=<?php "\"http://localhost/gamekm/post.php?post_id=".$row['postid']."\""?>>
				<textarea name='content'></textarea>
				<div class='message'><?=@$e1;?></div>	
				<p><input type="hidden" name="go" value="5"></p>
				<div>
					<span class='data'><?=@date("Y-m-d",time());?></span>
					<input type="submit" name="" class='commentButton' value="Отправить">
			</div>
			</form>
		</div>
	</div>


<h2 style="margin-top: 40px; margin-bottom: 40px;">Комментарии:</h2> 


<?php 
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

include 'connect/db.php'; /*подключаемся к БД*/
$query="SELECT * FROM comments WHERE postid='$postid' ORDER BY data DESC";
$rez = mysqli_query($link, $query) or die("Ошибка " .
mysqli_error($link));

while($row = mysqli_fetch_assoc($rez)) { 

$id = $row['userid'];
			include 'connect/db.php'; /*подключаемся к БД*/
			$query="SELECT * FROM users WHERE id='$id' ";
			$rez1 = mysqli_query($link, $query) or die("Ошибка " .
			mysqli_error($link));

			$comment_author = mysqli_fetch_assoc($rez1);
			mysqli_close($link);

echo"<div class='block comment-block reveal' style='margin-bottom: 40px;'>
		<div class='avatar'></div>
		<div class='comment-area'>
			<a href=\"http://localhost/gamekm/cabinet?user_id=".$row['userid']."\">".$comment_author['login']."</a>
			<div class='comment'>".$row['content']."</div>
			<div style='display:flex;'>
			<span class='data'>".$row['data']."</span>
			
			</div>		
		</div>
	</div>";
};

?>
</div>

<div id='note-window'>ntrn</div>

<script src="functions/like.js"></script>
<script src="functions/note.js"></script>

</body>

<footer>
<?php 
	include ("blocks/footer.php");
?>	
</footer>


</html>