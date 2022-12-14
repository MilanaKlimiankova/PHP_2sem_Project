<head>
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/cabinet.css">
	<link rel="stylesheet" href="http://localhost/gamekm/assets/css/general.css">
</head>

<body>
<?php 
	if(session_status()!=PHP_SESSION_ACTIVE) session_start();
	$userid = $_GET['userid'];
	include '../connect/db.php'; /*подключаемся к БД*/
	$query11="SELECT * FROM users WHERE id='$userid'";
	$rez11 = mysqli_query($link, $query11) or die("Ошибка " .
	mysqli_error($link));
	$row11 = mysqli_fetch_assoc($rez11);
	$subscribers = explode(',', $row11['subscribers']);

	for($i = 1; $i < count($subscribers); $i++) { 
		$sub = $subscribers[$i];
		$query111="SELECT * FROM users WHERE id='$sub'";
		$rez111 = mysqli_query($link, $query111) or die("Ошибка " .
		mysqli_error($link));
		$row111 = mysqli_fetch_assoc($rez111);

	    echo"<div class='sub'>
				<div class='sub-avatar'></div>
				<a href=\"http://localhost/gamekm/cabinet?user_id=".$row111['id']."\" target=\"_blank\" >".$row111['login']."</a>
			</div>";
				;
	}
	mysqli_close($link);
?>
</body>

