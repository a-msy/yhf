<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
@session_start();
$dbh = connectDB();
// プロフィールの変更後，受け取ったリダイレクト先にリダイレクト
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_REQUEST['user_id'])){
        $sql = 'SELECT user_name FROM users WHERE user_id = :user_id LIMIT 1';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':user_id', $_REQUEST['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->fetch()['user_id'] == $_SESSION['user_id']){
            if(isset($_REQUEST['simei']) && isset($_REQUEST['addr']) && $_REQUEST['redirect']){
                $sql = 'UPDATE users SET simei = :simei, addr = :addr WHERE user_id = :user_id';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':simei', $_REQUEST['simei'], PDO::PARAM_STR);
                $stmt->bindValue(':addr', $_REQUEST['addr'], PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $_REQUEST['user_id'], PDO::PARAM_INT);
                $stmt->execute();
                header('Location: '.$_REQUEST['redirect']);
                exit;
            }else{
                header('Location: ../index.php');
                exit;
            }
        }else{
            header('Location: ../index.php');
            exit;
        }
    }else{
        header('Location: ../index.php');
        exit;
    }
}else{
    header('Location: ../index.php');
    exit;
}
?>
