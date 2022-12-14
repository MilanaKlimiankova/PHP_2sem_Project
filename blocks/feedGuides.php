<head>
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/cabinet.css">
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
</head>

<body>
<?php 
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
	
	include '../connect/db.php'; /*подключаемся к БД*/
	$query="SELECT * FROM posts WHERE isguide='1' ORDER BY data DESC";
	$rez = mysqli_query($link, $query) or die("Ошибка " .
	mysqli_error($link));

	while($row = mysqli_fetch_assoc($rez)) { 
		 echo"<div class='post' >
					
    			<a href=\"http://localhost/gamekm/post.php?post_id=".$row['postid']."\" target=\"_blank\">".$row['theme']."</a>
					<div class='text'>".mb_substr($row['content'],0, 250,'UTF-8')."..."."</div>
					<div class='feedback'>
					<span class=data>".$row['data']."</span>
						<object
						  type=\"image/svg+xml\"
						  data=\"../assets/images/comment icon.svg\" class='commentIcon'>
						</object>
						<div class='counter-comments'>".$row['commentscount']."</div>
						<object
						  type=\"image/svg+xml\"
						  data=\"../assets/images/like icon.svg\"
						  style=\"margin-left: 10px;\">
						</object>
						<div class='counter-likes' >".$row['likescount']."</div>
					<div>
				</div>
			</div>
			</div>";
	}
	mysqli_close($link);
?>
</body>

