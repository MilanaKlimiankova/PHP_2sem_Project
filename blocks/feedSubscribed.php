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

	include '../connect/db.php';
	$query="SELECT * FROM users WHERE id='$userid'";
	$rez = mysqli_query($link, $query) or die("Ошибка " .
	mysqli_error($link));
	$row = mysqli_fetch_assoc($rez);
	$subscriptions = explode(',', $row['subscriptions']);

	for($i=1; $i<count($subscriptions); $i++){
		$userId1 = $subscriptions[$i];
		$query1="SELECT * FROM posts WHERE userid='$userId1' ORDER BY data DESC";
		$rez1 = mysqli_query($link, $query1) or die("Ошибка " .
		mysqli_error($link));

	    while($row1 = mysqli_fetch_assoc($rez1)) { //для каждого id вывожу все посты
			
		echo"<div class='post' >
					
    		<a href=\"http://localhost/gamekm/post.php?post_id=".$row1['postid']."\" target=\"_blank\">".$row1['theme']."</a>
					<div class='text'>".mb_substr($row1['content'],0, 250,'UTF-8')."..."."</div>
					<div class='feedback'>
					<span class=data>".$row1['data']."</span>
						<object
						  type=\"image/svg+xml\"
						  data=\"../assets/images/comment icon.svg\" class='commentIcon'>
						</object>
						<div class='counter-comments'>".$row1['commentscount']."</div>
						<object
						  type=\"image/svg+xml\"
						  data=\"../assets/images/like icon.svg\"
						  style=\"margin-left: 10px;\">
						</object>
						<div class='counter-likes' >".$row1['likescount']."</div>
					<div>
				</div>
			</div>
			</div>";
		}
		
	
	}
	mysqli_close($link);
?>
</body>

