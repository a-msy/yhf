<?php
// データベースに接続
$baseURL = "http://127.0.0.1/fW5sUn8K/html/api/";
$user = 'fW5sUn8K';
$pass = '_5(jYD$Z6(Jp';

$options = array('http' => array(
		'header' => array(
				'Authorization: Basic ' . base64_encode($user . ':' . $pass),
		)
));
$context = stream_context_create($options);

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
