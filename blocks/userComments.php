<head>
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/cabinet.css">
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="http://localhost/gamekm/functions/reveal.js" defer></script>
</head>

<body>
	<?php 
	if(session_status()!=PHP_SESSION_ACTIVE) session_start();

	$userid = $_GET['userid'];
	
	include '../connect/db.php'; /*подключаемся к БД*/
	$query="SELECT * FROM comments WHERE userid='$userid' ORDER BY data DESC";
	$rez = mysqli_query($link, $query) or die("Ошибка " .
	mysqli_error($link));

	while($row = mysqli_fetch_assoc($rez)) { 
		$postid = $row['postid'];
		$query1="SELECT * FROM posts WHERE postid='$postid'";
		$rez1 = mysqli_query($link, $query1) or die("Ошибка " .
		mysqli_error($link));
		$row1 = mysqli_fetch_assoc($rez1);

    	echo"<div class='post' >	
    	<div class='text' style='font-size: 24px; margin-bottom: 20px; margin-top: 0px;'>".mb_substr($row['content'],0, 100,'UTF-8')."..."."</div>		
    	<a style='font-size: 12px;' href=\"http://localhost/gamekm/post.php?post_id=".$row['postid']."\" target=\"_blank\">".$row1['theme']."</a>
    
					
					<div class='feedback' style='margin-top:20px;'>
					<span class=data>".$row['data']."</span>
					</div>
				</div>
			</div>
			</div>";
	}
	mysqli_close($link);
	?>
</body>

