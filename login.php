<?php
$title = "お客様ページ";
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/api/auth.php';
require_unlogined_session();

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();

// ユーザから受け取ったユーザ名とパスワード
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if(isset($username)){
    $sql = 'SELECT password FROM `users` WHERE `user_name` = :username';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $hashes[$username]=$stmt->fetch()['password'];
}
// POSTメソッドのときのみ実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify(
            $password,
            isset($hashes[$username])
                ? $hashes[$username]
                : '$2y$10$abcdefghijklmnopqrstuv' // ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
        )
    ) {
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
        session_regenerate_id(true);
        // ユーザ名をセット
        $_SESSION['username'] = $username;
        // ログイン完了後に / に遷移
        header('Location: ./mypage.php');
        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
}

header('Content-Type: text/html; charset=UTF-8');

?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<h1>ログインしてください</h1>
<form method="post" action="./login.php">
    ユーザ名: <input type="text" name="username" value="">
    パスワード: <input type="password" name="password" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="ログイン">
</form>
<?php if (http_response_code() === 403): ?>
    <p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
