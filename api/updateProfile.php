<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
@session_start();
$dbh = connectDB();
// プロフィールの変更後，受け取ったリダイレクト先にリダイレクト
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userid'])) {
        if (isset($_REQUEST['simei']) && isset($_REQUEST['addr']) && $_REQUEST['redirect']) {
            $sql = 'UPDATE users SET simei = :simei, addr = :addr WHERE user_id = :userid';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':simei', $_REQUEST['simei'], PDO::PARAM_STR);
            $stmt->bindValue(':addr', $_REQUEST['addr'], PDO::PARAM_STR);
            $stmt->bindValue(':userid', $_SESSION['userid'], PDO::PARAM_INT);
            $stmt->execute();
            header('Location: ' . $_REQUEST['redirect']);
            exit;
        } else {
            echo "INVALID REQUESTS";
        }
    } else {
        echo "PLEASE LOGIN";
    }
} else {
    echo "ONLY POST";
}
?>
