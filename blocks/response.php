<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();


include '../connect/db.php'; //в проекте надо будет уточнить путь к файлу
$error='';
$msg='';
$userId = $_SESSION['id']; // id пользователя (в проекте будет браться из сессии)
$id=$_GET['post_id']; // id контента (в проекте будет браться из сессии)


$query="SELECT count(*) FROM likes WHERE userid = '$userId' AND postid = '$id'";
$sql = mysqli_query($link, $query) or die(mysql_error());
$result = mysqli_fetch_row($sql);
//если что-то пришло из запроса, значит уже голосовал
if($result[0]>0)
    {
        $error='Публикация уже добавлена в избранное';
    }else
        { // если пользователь не голосовал, проголосуем
            // делаем запись о том, что пользователь проголосовал
            $query="INSERT INTO likes (userid, postid) VALUES ($userId, $id)";
            mysqli_query($link, $query) or die(mysql_error());

            // делаем запись для контента - увеличиваем количесво голосов(лак или дизлайк)
            $query="UPDATE posts SET likescount =likescount + 1 WHERE  postid = $id";
            mysqli_query($link, $query) or die(mysql_error());
            $msg='Добавлено в избранное';
        }

if($error!=''){
    // если есть ошибки то отправляем ошибку и ее текст
    echo json_encode(array('result' => 'error', 'msg' => $error));
    }
if ($msg!=''){
    // если нет ошибок сообщаем об успехе
    echo json_encode(array('result' => 'success','msg'=>$msg));
    }

?>
