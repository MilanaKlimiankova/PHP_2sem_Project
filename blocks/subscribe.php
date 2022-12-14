<?php

if(session_status()!=PHP_SESSION_ACTIVE) session_start();

include '../connect/db.php'; //в проекте надо будет уточнить путь к файлу
$error='';
$msg='';
$userId = $_SESSION['id']; // id пользователя (в проекте будет браться из сессии)
$id=(int)$_GET['user_id']; 

$query="SELECT subscriptions FROM users WHERE id = '$userId'";
$sql = mysqli_query($link, $query) or die(mysql_error());
$result = mysqli_fetch_row($sql);
$array = explode(',', $result[0]);

foreach ($array as $value){
    if ($value == $id){
        $error='Вы уже подписаны на этого человека';
        break;
    }
}

if($error!=''){
    // если есть ошибки то отправляем ошибку и ее текст
    echo json_encode(array('result' => 'error', 'msg' => $error));
}else{
    array_push($array, $id);
    $string = implode(',', $array);

    $query="UPDATE users SET subscriptions = '$string' WHERE id = '$userId'";
    mysqli_query($link, $query) or die(mysql_error());

    $query="SELECT subscribers FROM users WHERE id = '$id'";
    $sql = mysqli_query($link, $query) or die(mysql_error());
    $result = mysqli_fetch_row($sql);
    $array1 = explode(',', $result[0]);
    array_push($array1, $userId);
    $string1 = implode(',', $array1);
    $query="UPDATE users SET subscribers = '$string1' WHERE id = '$id'";
    mysqli_query($link, $query) or die(mysql_error());

    $msg='Подписка оформлена';
}

if ($msg!=''){
    // если нет ошибок сообщаем об успехе
    echo json_encode(array('result' => 'success','msg'=>$msg));
}

?>
