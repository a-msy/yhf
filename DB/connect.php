<?php
// データベースに接続
function connectDB() {
    $dsn = 'mysql:dbname=honey;host=127.0.0.1;charset=utf8'; //データベース名とホスト名
    $user='root';   //データベースのユーザー名
    $password='0525';    //データベースのパスワード
    try {
        $dbh = new PDO($dsn, $user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $dbh;

    } catch (PDOException $e) {         //  データベースに接続出来なかった場合の処理
        print'エラー';      //  エラーメッセージを表示して終了
        exit();
    }
}
?>
