<head>
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/cabinet.css">
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="http://localhost/gamekm/functions/reveal.js" defer></script>
</head>

<body>
<?php 
	if(session_status()!=PHP_SESSION_ACTIVE) session_start();

	include '../connect/db.php'; /*подключаемся к БД*/
	$query="SELECT * FROM comments WHERE postid='$postid'";
	$rez = mysqli_query($link, $query) or die("Ошибка " .
	mysqli_error($link));

	while($row = mysqli_fetch_assoc($rez)) { 

    echo"<div class='post reveal' >
					
    <a href=\"http://localhost/gamekm/post.php?post_id=".$row['postid']."\" target=\"_blank\">".$row['content']."</a>
					<div class='text'>".mb_substr($row['content'],0, 250,'UTF-8')."..."."</div>
					
			</div>
			</div>";
	}
	mysqli_close($link);
?>
</body>

