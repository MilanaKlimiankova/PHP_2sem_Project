<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

if (isset($_POST['theme'])) { $theme = $_POST['theme']; if ($theme ==
'') { unset($theme);} }
if (isset($_POST['content'])) { $content=$_POST['content']; if
($content =='') { unset($content);} }
if (isset($_POST['isguide'])) { //чекбокс
	$_SESSION['isguide'] = $_POST['isguide'];
	}
else {
	unset($_SESSION['isguide']);
}


 if(isset($_POST["go"])):

		 $e1=null;
		 $theme=trim($_POST["theme"]);
		 $theme=strip_tags($theme);
		 $theme=stripslashes($theme);
		 if(strlen($theme)=="0"):
		 	$e1.="Это обязательное поле<br>";
		 endif;
		

		 $e2=null;
		 $content=trim($_POST["content"]);
		 $content=strip_tags($content);
		 $content=htmlspecialchars($content,ENT_QUOTES);
		 $content=stripslashes($content);
		  if(strlen($content)=="0"):
		 	$e2.="Это обязательное поле<br>";
		 endif;
			
		 $id = $_SESSION['id'];

		 if (isset($_SESSION['isguide'])){
		 	$isguide=1;
		 } else {
		 	$isguide=0;
		 }

		 $eEn=$e1.$e2;
		 if($eEn==""):
			 $tm = date("Y-m-d H:i:s",time());
			 include 'connect/db.php'; /*подключаемся к БД*/
			 $query="INSERT INTO posts (userid, theme, content, isguide, data) VALUES
			('$id','$theme','$content','$isguide', ' $tm')";
			$result=mysqli_query($link, $query) or die("Ошибка " .
			mysqli_error($link));

			if ($result) /*пишем данные в БД и авторизовываем
			пользователя*/
			{
				 $query="SELECT * FROM posts WHERE userid='$id'";
				 $rez = mysqli_query($link, $query);
				 if ($rez)
				 {
					/*выводим уведомление об успехе операции и
					перезагружаем страничку*/
					echo "<script language='Javascript' type='text/javascript'> alert('Пост опубликован!')</script>";
					 echo "<script language='Javascript'
						type='text/javascript'>
						 function reload(){
						 	top.location = 'create-post.php'};
						 setTimeout('reload()', 0)
						 </script>";
				} else {
					 echo "<script language='Javascript'
					type='text/javascript'>
					 alert ('Ошибка при публикации поста!');
					</script>";
 }
 }
 endif;
 endif;

?>

<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Главная</title>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/footer.css">
	<link rel="stylesheet" href="assets/css/general.css">
	<link rel="stylesheet" href="assets/css/create-post.css">
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
		<h2 style="text-align: center; margin-bottom: 40px">Создание поста</h2>
		<div class='block'style="height: 640px;">
			<form method="post" action="create-post.php">
				<div class='label-theme'>
					<h2>Тема:</h2>
					<input class='theme' name="theme">
				</div>
				<div class='message'><?=@$e1;?></div>
				<textarea placeholder="Поделись своими мыслями..." name = 'content'></textarea>
				<div class='message'><?=@$e2;?></div>
				<p><input type="hidden" name="go" value="5"></p>
				<div class='check-button' name='isguide'>
					<span>Это игровой гайд</span>
					<input type="checkbox" name="isguide" class='check'> 
					
					<input type="submit" name="" value="Опубликовать" class="button">
				</div>
			</form>
		</div>
		
	</div>
</body>

<footer>
	<?php 
		include ("blocks/footer.php");
	?>	
</footer>


</html>